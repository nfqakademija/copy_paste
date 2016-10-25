<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Form\PostType;
use AppBundle\Entity\Post;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Faker\ORM\Propel\Populator;


class HomeController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Home:index.html.twig', []);
    }

    /**
     * @Route("/list", name="posts_list")
     */
    public function listAction(Request $request)
    {
        /**
         * @var EntityManager $em
         */
        $em    = $this->get('doctrine.orm.entity_manager');

        $qb = $em->getRepository(Post::class)->createQueryBuilder("entity");

        $qb->join("entity.createdBy", "user");

        $dql   = "SELECT a, u FROM AppBundle:Post a JOIN a.createdBy u";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb->getQuery(), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            1/*limit per page*/
        );

        // parameters to template
        return $this->render('AppBundle:Home:list.html.twig', array('pagination' => $pagination));
    }

    /**
     * @Route("/create", name="posts_create")
     */
    public function createAction(Request $request)
    {

        $postService = $this->get('app.post');
        $username = $this->getUser();

        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $post->setCreatedAt(new \DateTime());
            $post->setCreatedBy($username);
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            return $this->redirectToRoute('posts_list');
        }

        return $this->render(
            'AppBundle:Home:create.html.twig',
            array('form' => $form->createView())
        );

    }

    /**
     * @Route("/view/{id}", name="posts_view")
     */
    public function viewAction($id)
    {
        $postService = $this->get('app.post');

        $post = $postService->getSinglePost($id);
        return $this->render(
            'AppBundle:Home:view.html.twig', ['post' => $post]
        );
    }

    /**
     * @Route("/delete/{id}", name="posts_delete")
     */
    public function deleteAction($id)
    {
        $postService = $this->get('app.post');

        $postService->deletePost($id);

        return $this->redirectToRoute('posts_list');
    }
}
