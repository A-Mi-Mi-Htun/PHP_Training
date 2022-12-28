<?php

namespace App\Services\Major;

use Illuminate\Http\Request;
use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Contracts\Services\Major\MajorServiceInterface;

/**
 * Service class for Major.
 */
class MajorService implements MajorServiceInterface
{
    /**
     * Major dao
     */
    private $majordao;
    /**
     * Class Constructor
     * @param MajorDaoInterface
     * @return
     */
    public function __construct(MajorDaoInterface $majordao)
    {
        $this->majordao = $majordao;
    }
    /**
     * To get Major list
     * @return array $MajorList Major list
     */
    public function index()
    {
        return $this->majordao->index();
    }

    public function createMajor(Request $request)
    {
        return $this->majordao->createMajor($request);
    }

    public function editMajor($id)
    {
        return $this->majordao->editMajor($id);
    }

    public function updateMajor($request, $id)
    {
        return $this->majordao->updateMajor($request, $id);
    }

    public function deleteMajor($id)
    {
        return $this->majordao->deleteMajor($id);
    }
}
