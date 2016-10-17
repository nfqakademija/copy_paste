<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Form\PostType;
use AppBundle\Entity\Post;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;


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
    public function listAction()
    {
        $postService = $this->get('app.post');

        $posts = $postService->getAllPosts();

        return $this->render('AppBundle:Home:list.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/create", name="posts_create")
     */
    public function createAction(Request $request)
    {

        $postService = $this->get('app.post');

        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
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
