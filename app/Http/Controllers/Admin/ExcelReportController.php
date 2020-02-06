<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\CsvImportTrait;


class ExcelReportController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function show()
    {
        //
    }

    public function destroy()
    {
        //
    }

    public function massDestroy()
    {
        //
    }

    public function excelForApproved()
    {
        abort_if(Gate::denies('excel_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = Student::all();
        $index = 1;

        return view('admin.excelReports.excel-for-approved', compact('students', 'index'));
    }
    
    public function excelForPending()
    {
        abort_if(Gate::denies('excel_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = Student::all();
        $index = 1;

        return view('admin.excelReports.excel-for-pending', compact('students', 'index'));
    }
}
