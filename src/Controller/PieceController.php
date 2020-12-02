<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace App\Controller;

use App\Model\PieceManager;
use App\Model\ObjetManager;

/**
 * Class PieceController
 *
 */
class PieceController extends AbstractController
{
    /**
     * Display Piece listing
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $pieceManager = new PieceManager();
        $pieces = $pieceManager->selectAll();

        return $this->twig->render('Piece/index.html.twig', ['pieces' => $pieces]);
    }


    /**
     * Display piece informations specified by $id
     *
     * @param int $id
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function show(int $id)
    {
        $pieceManager = new PieceManager();
        $piece = $pieceManager->selectOneById($id);

        return $this->twig->render('Piece/show.html.twig', ['piece' => $piece]);
    }


    /**
     * Display piece edition page specified by $id
     *
     * @param int $id
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function edit(int $id): string
    {
        $pieceManager = new PieceManager();
        $piece = $pieceManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $piece['title'] = $_POST['title'];
            $pieceManager->update($piece);
        }

        return $this->twig->render('Piece/edit.html.twig', ['piece' => $piece]);
    }


    /**
     * Display piece creation page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pieceManager = new PieceManager();
            $piece = [
                'title' => $_POST['title'],
            ];
            $id = $pieceManager->insert($piece);
            header('Location:/piece/show/' . $id);
        }

        return $this->twig->render('Piece/add.html.twig');
    }


    /**
     * Handle piece deletion
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        $pieceManager = new PieceManager();
        $pieceManager->delete($id);
        header('Location:/piece/index');
    }
}
