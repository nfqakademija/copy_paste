<?php
/**
 * Created by PhpStorm.
 * User: robertas
 * Date: 16.10.8
 * Time: 12.28
 */

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use AppBundle\Form\PostType;
use Symfony\Component\Validator\Constraints\DateTime;


class PostService
{

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getAllPosts()
    {
        $repository = $this->em->getRepository('AppBundle:Post');
        $posts = $repository->findAll();

        return $posts;
    }

    public function getSinglePost($id) {
        $repository = $this->em->getRepository('AppBundle:Post');
        $post = $repository->findOneById($id);

        return $post;
    }

    public function deletePost($id) {
        $repository = $this->em->getRepository('AppBundle:Post');
        $post = $repository->findOneById($id);
        $this->em->remove($post);
        $this->em->flush();
    }
}