<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\FormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/index", name="admin_default_index", methods={"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(FormType::class, ['method' => 'get']);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $this->addFlash('success', '操作成功');

            return $this->redirectToRoute('admin_default_index');
        }

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
