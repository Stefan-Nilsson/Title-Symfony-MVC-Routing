<?php

namespace App\Controller;

use App\Entity\Task;

use App\Entity\Type\TaskType;
use App\Entity\User;
use App\Form\UserNameType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class LearningController extends AbstractController
{
    /**
     * @Route("/", name="learning")
     * @param Request $request
     * @return Response
     */

    public function new(Request $request)
    {
        $form = $this->createForm(UserNameType::class);
        $userName = new User();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $userName = $form->getData();
           /* $routeName = $request->attributes->get('_route');
            $routeParameters = $request->attributes->get('_route_params');

            // use this to get all the available attributes (not only routing ones):
            $allAttributes = $request->attributes->all();*/

            // some extra symf info, one might say: symfo.
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            return $this->redirectToRoute('output',['name'=>$userName->getName()/*, 'name1'=>$routeParameters*/]);

        }




        return $this->render('learning/index.html.twig', [
            'controller_name' => 'tet',
            'form' => $form->createView(),


        ]);
    }

    /**
     * @Route("/learning/nameoutput", name="output")
     * @param Request $request
     * @return Response
     */

    public function output(Request $request){

        $name = $request->query->get('name');
        return $this->render('learning/nameoutput.html.twig', [
            'name' => $name
        ]);

    }
}



    /*public function index()
    {

        $form = $this->createForm(UserNameType::class);

        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearnToSymf',
            'form' => $form->createView(),
        ]);
    }*/






