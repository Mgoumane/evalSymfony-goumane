<?php

namespace App\Controller;

use App\Entity\Louer;
use App\Form\LouerType;
use App\Repository\LouerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/louer')]
class LouerController extends AbstractController
{
    #[Route('/', name: 'app_louer_index', methods: ['GET'])]
    public function index(LouerRepository $louerRepository): Response
    {
        return $this->render('louer/index.html.twig', [
            'louers' => $louerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_louer_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LouerRepository $louerRepository): Response
    {
        $louer = new Louer();
        $form = $this->createForm(LouerType::class, $louer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $louerRepository->save($louer, true);

            return $this->redirectToRoute('app_louer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('louer/new.html.twig', [
            'louer' => $louer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_louer_show', methods: ['GET'])]
    public function show(Louer $louer): Response
    {
        return $this->render('louer/show.html.twig', [
            'louer' => $louer,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_louer_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Louer $louer, LouerRepository $louerRepository): Response
    {
        $form = $this->createForm(LouerType::class, $louer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $louerRepository->save($louer, true);

            return $this->redirectToRoute('app_louer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('louer/edit.html.twig', [
            'louer' => $louer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_louer_delete', methods: ['POST'])]
    public function delete(Request $request, Louer $louer, LouerRepository $louerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$louer->getId(), $request->request->get('_token'))) {
            $louerRepository->remove($louer, true);
        }

        return $this->redirectToRoute('app_louer_index', [], Response::HTTP_SEE_OTHER);
    }
}
