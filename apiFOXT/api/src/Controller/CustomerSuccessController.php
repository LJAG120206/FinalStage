<?php

namespace App\Controller;

use App\Entity\CustomerSuccess;
use App\Form\CustomerSuccessType;
use App\Repository\CustomerSuccessRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/customer/success")
 */
class CustomerSuccessController extends AbstractController
{
    /**
     * @Route("/", name="app_customer_success_index", methods={"GET"})
     */
    public function index(CustomerSuccessRepository $customerSuccessRepository): Response
    {
        return $this->render('customer_success/index.html.twig', [
            'customer_successes' => $customerSuccessRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_customer_success_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CustomerSuccessRepository $customerSuccessRepository): Response
    {
        $customerSuccess = new CustomerSuccess();
        $form = $this->createForm(CustomerSuccessType::class, $customerSuccess);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $customerSuccessRepository->add($customerSuccess);
            return $this->redirectToRoute('app_customer_success_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('customer_success/new.html.twig', [
            'customer_success' => $customerSuccess,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_customer_success_show", methods={"GET"})
     */
    public function show(CustomerSuccess $customerSuccess): Response
    {
        return $this->render('customer_success/show.html.twig', [
            'customer_success' => $customerSuccess,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_customer_success_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, CustomerSuccess $customerSuccess, CustomerSuccessRepository $customerSuccessRepository): Response
    {
        $form = $this->createForm(CustomerSuccessType::class, $customerSuccess);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $customerSuccessRepository->add($customerSuccess);
            return $this->redirectToRoute('app_customer_success_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('customer_success/edit.html.twig', [
            'customer_success' => $customerSuccess,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_customer_success_delete", methods={"POST"})
     */
    public function delete(Request $request, CustomerSuccess $customerSuccess, CustomerSuccessRepository $customerSuccessRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$customerSuccess->getId(), $request->request->get('_token'))) {
            $customerSuccessRepository->remove($customerSuccess);
        }

        return $this->redirectToRoute('app_customer_success_index', [], Response::HTTP_SEE_OTHER);
    }
}
