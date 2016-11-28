<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Activity;
use AppBundle\Entity\Result;
use AppBundle\Entity\StudentInfo;
use AppBundle\Form\ResultType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ResultController extends Controller
{
    /**
     * @Route("result/new", name="result_new")
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        if ($request->getMethod() == 'POST') {
            $data = $request->request->all();
            $result = reset($data);
            $student = $this->getDoctrine()->getRepository(StudentInfo::class)->findOneById($result['studentInfoId']);
            $activity = $this->getDoctrine()->getRepository(Activity::class)->findOneById($result['activityId']);
            $newResult = new Result($result['value'], new \DateTime(), $activity, $student);
            $em->persist($newResult);
            $em->flush();
            if($request->isXmlHttpRequest()) {
                return new JsonResponse(array('message' => 'Naujas rezultatas įrašytas!'), 200);
            } else {
                return $this->redirect($request->headers->get('referer'));
            }
        }

        return new JsonResponse(array('message' => 'Klaida!'), 400);
    }

}
