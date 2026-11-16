<?php
namespace App\Controllers;

use App\Core\Database;
use App\Models\MahasiswaRepository;

class MahasiswaController extends Controller 
{
    private MahasiswaRepository $repo;

    public function __construct() 
    {
        $this->repo = new MahasiswaRepository(Database::getInstance());
    }

    public function index(): void 
    {
        $keyword = $_GET['search'] ?? null;
        $mahasiswaList = $this->repo->all($keyword);

        $this->view('mahasiswa/index', [
            'mahasiswaList' => $mahasiswaList,
            'title'         => 'Daftar Mahasiswa'
        ]);
    }

    public function create(): void 
    {
        $prodiList = $this->repo->getAllProdi();
        $this->view('mahasiswa/create', [
            'prodiList' => $prodiList,
            'title'     => 'Tambah Mahasiswa'
        ]);
    }

    public function store(): void 
    {
        $this->repo->create($_POST);
        $this->redirect('/mahasiswa');
    }

    public function edit($id): void 
    {
        $mahasiswa = $this->repo->find((int)$id);
        $prodiList = $this->repo->getAllProdi();

        $this->view('mahasiswa/edit', [
            'mahasiswa' => $mahasiswa,
            'prodiList' => $prodiList,
            'title'     => 'Edit Mahasiswa'
        ]);
    }

    public function update($id): void 
    {
        $this->repo->update((int)$id, $_POST);
        $this->redirect('/mahasiswa');
    }

    public function destroy($id): void 
    {
        $this->repo->delete((int)$id);
        $this->redirect('/mahasiswa');
    }
}