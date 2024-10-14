<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSubsidioPortfolio extends Model
{
    protected $table            = 'subsidio';
    protected $primaryKey       = 'id_subsidio';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['salario_subsidio_funsionario', 'salario_subsidio_osan_sai', 'total_subsidio', 'horas_foti_subsidio', 'data_hahu_aktividade', 'data_remata_aktividade', 'aktivo_subsidio'];

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

    public function getsubsidio()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('subsidio');
        $builder->join('osan_sai', 'subsidio.salario_subsidio_osan_sai  = osan_sai.id_osan_sai', 'naran_osan_sai',
        'total_osan_sai', 'left');
        $builder->join('administrator', 'subsidio.salario_subsidio_funsionario = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $builder->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 
        'sistema', 'left');
        $query = $builder->get()->getResult(); 
        return $query;
    }
    function subsidioPagination($num, $keyword = null)
    {
        $this->join('osan_sai', 'subsidio.salario_subsidio_osan_sai  = osan_sai.id_osan_sai', 'naran_osan_sai','total_osan_sai', 'left');
        $this->join('administrator', 'subsidio.salario_subsidio_funsionario = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 'sistema', 'left');
        if ($keyword != '') {
            $this->like('naran_kompleto', $keyword);
            $this->orLike('fatin_moris', $keyword);
            $this->orLike('loron_moris', $keyword);
            $this->orLike('numero_eleitural', $keyword);
            $this->orLike('status_servisu', $keyword);
            $this->orLike('jenero', $keyword);
        }
        $this->orderBy('id_subsidio', 'DESC');
        return [
            'subsidio' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filtersubsidio($num){
        $this->join('osan_sai', 'subsidio.salario_subsidio_osan_sai  = osan_sai.id_osan_sai', 'naran_osan_sai','total_osan_sai', 'left');
        $this->join('administrator', 'subsidio.salario_subsidio_funsionario = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 'sistema', 'left');

        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_hahu_aktividade >=', $start);
        $this->where('data_hahu_aktividade <=', $end);
        return [
            'subsidio' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function filtersubsidioPdfExcel(){
        $this->join('osan_sai', 'subsidio.salario_subsidio_osan_sai  = osan_sai.id_osan_sai', 'naran_osan_sai','total_osan_sai', 'left');
        $this->join('administrator', 'subsidio.salario_subsidio_funsionario = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 'sistema', 'left');

        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_hahu_aktividade >=', $start);
        $this->where('data_hahu_aktividade <=', $end);
        $query = $this->findAll();
        return $query;
    }
    public function rowsubsidio()
    {
        $this->join('osan_sai', 'subsidio.salario_subsidio_osan_sai  = osan_sai.id_osan_sai', 'naran_osan_sai','total_osan_sai', 'left');
        $this->join('administrator', 'subsidio.salario_subsidio_funsionario = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 'sistema', 'left');

        $query = $this->first();
        return $query;
    }

    public function resultsubsidio()
    {
        $this->join('osan_sai', 'subsidio.salario_subsidio_osan_sai  = osan_sai.id_osan_sai', 'naran_osan_sai','total_osan_sai', 'left');
        $this->join('administrator', 'subsidio.salario_subsidio_funsionario = administrator.id_administrator', 
        'naran_kompleto', 'loron_moris', 'image_administrator','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'administrator.sistema_administrator = sistema.id_sistema', 'sistema', 'left');

        $query = $this->findAll();
        return $query;
    }
}
