<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Schedule;
use App\Models\Task;
use setasign\Fpdi\Fpdi;

define('FPDF_FONTPATH', public_path('/assets/fonts/'));

class DashboardController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        $scheduleUser = Schedule::where('grade_id', auth()->user()->getGradeId())->first();
        $taskUser = Task::where('grade_id', auth()->user()->getGradeId())->first();
        $materialUser = Material::where('grade_id', auth()->user()->getGradeId())->first();
        return view('student.dashboard', compact('schedules', 'scheduleUser', 'taskUser', 'materialUser'));
    }

    public function create()
    {
        $name = auth()->user()->name;
        $outputFile = public_path() . 'output.pdf';
        $this->fillPdf(public_path() . '/master/cert.pdf', $outputFile, $name);
        return response()->file($outputFile);
    }

    public function fillPdf($file, $outputFile, $name)
    {
        $fpdi = new Fpdi();
        $fpdi->setSourceFile($file);
        $fpdi->AddFont('CustomFont', "", 'PinyonScript.php');
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
        $fpdi->useTemplate($template);
        $fpdi->SetFont("CustomFont", "", 56);
        $fpdi->SetTextColor(130, 105, 4);
        $pageWidth = $fpdi->GetPageWidth();
        $textWidth = $fpdi->GetStringWidth($name);
        $x = ($pageWidth - $textWidth) / 2;
        $top = 95;
        $fpdi->Text($x, $top, $name);
        return $fpdi->Output($outputFile, "F");
    }
}
