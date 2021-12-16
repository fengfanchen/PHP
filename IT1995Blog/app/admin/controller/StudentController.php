<?php

namespace admin\controller;
use core\Controller;
use home\model\StudentModel;

class StudentController extends Controller{


    public function student(){

        $page = $_REQUEST["page"] ?? 1;
        $studentModel = new StudentModel();
        $students = $studentModel->getAllStudents($page);
        $counts = $studentModel->getCounts();
        $this->assign("students", $students);
        $this->assign("counts", $counts);
        $this->display("student.html");
    }
}