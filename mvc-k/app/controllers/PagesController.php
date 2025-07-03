<?php
class PagesController extends Controller {
    public function contact() {
        $this->view('pages/contact');
    }

    public function buy() {
        $this->view('pages/buy');
    }

    public function add() {
        $this->view('pages/add');
    }
}
