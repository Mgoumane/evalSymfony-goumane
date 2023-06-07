<?php

namespace App\Controller;

use App\Entity\Immeuble;
use App\Form\ImmeubleType;
use App\Repository\ImmeubleRepository;
use Doctrine\ORM\Query\Expr\Select;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/immeuble')]
class ImmeubleController extends AbstractController
{
    
    #[Route('/', name: 'app_immeuble_index', methods: ['GET'])]
    public function index(ImmeubleRepository $immeubleRepository): Response
    {
        return $this->render('immeuble/index.html.twig', [
            'immeubles' => $immeubleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_immeuble_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ImmeubleRepository $immeubleRepository): Response
    {
        $immeuble = new Immeuble();
        $form = $this->createForm(ImmeubleType::class, $immeuble);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $immeubleRepository->save($immeuble, true);

            return $this->redirectToRoute('app_immeuble_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('immeuble/new.html.twig', [
            'immeuble' => $immeuble,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_immeuble_show', methods: ['GET'])]
    public function show(Immeuble $immeuble): Response
    {
        return $this->render('immeuble/show.html.twig', [
            'immeuble' => $immeuble,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_immeuble_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Immeuble $immeuble, ImmeubleRepository $immeubleRepository): Response
    {
        $form = $this->createForm(ImmeubleType::class, $immeuble);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $immeubleRepository->save($immeuble, true);

            return $this->redirectToRoute('app_immeuble_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('immeuble/edit.html.twig', [
            'immeuble' => $immeuble,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_immeuble_delete', methods: ['POST'])]
    public function delete(Request $request, Immeuble $immeuble, ImmeubleRepository $immeubleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$immeuble->getId(), $request->request->get('_token'))) {
            $immeubleRepository->remove($immeuble, true);
        }

        return $this->redirectToRoute('app_immeuble_index', [], Response::HTTP_SEE_OTHER);
    }
}
