<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMateriaKursus extends Model
{
    protected $table            = 'materia_kursus';
    protected $primaryKey       = 'id_materia_kursus';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['materia_kursus', 'level_materia_kursus', 'preso_materia_kursus', 'data_materia_kursus', 'aktivo_materia_kursus'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getMateriaKursus()
    {
        $this->db = \Config\Database::connect();

        $builde = $this->db->table('materia_kursus');
        $query = $builde->get()->getResult();
        return $query;
    }

    public function materiaKursusPagination($num, $keyword=null)
    {
        $this->builder();
        if ($keyword !='') {
            $this->like('materia_kursus', $keyword);
            $this->orLike('level_materia_kursus', $keyword);
            $this->orLike('preso_materia_kursus', $keyword);
            $this->orLike('data_materia_kursus', $keyword);
            $this->orLike('decripsaun_materia_kursus', $keyword);
        }
        $this->orderBy('id_materia_kursus', 'DESC');
        return [
            'materiakursus' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function filterMateriaKursus($num)
    {
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_materia_kursus >=', $start);
        $this->where('data_materia_kursus <=', $end);
        return [
            'materiakursus' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
}
