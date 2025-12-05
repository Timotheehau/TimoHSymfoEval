<?php

// src/Controller/ProfileController.php
namespace App\Controller;

use App\Entity\User;
use App\Form\ChangePasswordType;
use App\Form\ProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    #[IsGranted('ROLE_USER')]
    public function index(
        Request $request,
        UserPasswordHasherInterface $hasher,
        EntityManagerInterface $em
    ): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        // Formulaire avatar (URL personnalisée)
        $profileForm = $this->createForm(ProfileType::class, $user);
        $profileForm->handleRequest($request);

        if ($profileForm->isSubmitted() && $profileForm->isValid()) {
            /** @var UploadedFile $avatarFile */
            $avatarFile = $profileForm->get('avatarFile')->getData();

            if ($avatarFile) {
                $filename = uniqid() . '.' . $avatarFile->guessExtension();
                $avatarFile->move($this->getParameter('avatars_directory'), $filename);
                $user->setAvatar('/uploads/avatars/' . $filename);
            }

            $em->persist($user);
            $em->flush();
            $this->addFlash('success', 'Profil mis à jour !');

            return $this->redirectToRoute('app_profile');
        }

        // Formulaire changement de mot de passe
        $passwordForm = $this->createForm(ChangePasswordType::class);
        $passwordForm->handleRequest($request);

        if ($passwordForm->isSubmitted() && $passwordForm->isValid()) {
            $plainPassword = $passwordForm->get('plainPassword')->getData();
            $hashedPassword = $hasher->hashPassword($user, $plainPassword);
            $user->setPassword($hashedPassword);

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Mot de passe mis à jour avec succès !');

            return $this->redirectToRoute('app_profile');
        }
        return $this->render('profile/index.html.twig', [
            'user' => $user,
            'profileForm' => $profileForm->createView(),
            'passwordForm' => $passwordForm->createView(),
        ]);
    }
}