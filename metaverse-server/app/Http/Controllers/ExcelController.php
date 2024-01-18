<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuarios.importar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function exportarUsuarios()
    {
        $spreadsheet = IOFactory::load(storage_path('plantillas/exportarUsuarios.xls'));
        $usuarios = User::all();
        $sheetactiva = $spreadsheet->setActiveSheetIndex(0);

        foreach ($usuarios as $usuario) {
            // TODO: Ordenar los usuarios por el orden de la web o alfabeticamente
            $sheetactiva->insertNewRowBefore(5,1);
            $sheetactiva->setCellValue('A5', $usuario->name);
            $sheetactiva->setCellValue('B5', $usuario->email);
        }

        $sheetactiva->getColumnDimension('A')->setWidth(45);
        $sheetactiva->getColumnDimension('B')->setWidth(45);

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Lista de Usuarios');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xls)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="exportacionUsuarios.xls"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save('php://output');
        exit;
    }

    public function importarUsuarios(Request $request)
    {
        $file = $request->file('upload');

        if($file){
            
            $routeFile = $file->getRealPath();

            $spreadsheet = IOFactory::load($routeFile);
            $sheetactiva = $spreadsheet->getActiveSheet();


        }

        return redirect()->back()->with(["status" => "Sube un fichero"]);

    }

}
