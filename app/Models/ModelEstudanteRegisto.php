<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelEstudanteRegisto extends Model
{
    protected $table            = 'estudante_registo';
    protected $primaryKey       = 'id_estudante_registo';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['titulo_estudante_registo', 'conta_estudante_registo', 'data_estudante_registo','aktivo_estudante_registo'];

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

    public function getestudanteregisto()
    {
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('estudante_registo');
        $builder->join('estudante', 'estudante_registo.conta_estudante_registo = estudante.id_estudante', 
        'naran_kompletos', 'loron_moris', 'image_estudante','numero_telefone', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $builder->join('sistema', 'estudante.sistema_estudante = sistema.id_sistema', 
        'sistema', 'left');
        $query = $builder->get()->getResult(); 
        return $query;
    }
    public function estudanteregistoPagination($num, $keyword = null)
    {
        $this->join('estudante', 'estudante_registo.conta_estudante_registo = estudante.id_estudante', 'naran_kompletos', 'loron_moris', 'image_estudante', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'estudante.sistema_estudante = sistema.id_sistema', 
        'sistema', 'left');
        if ($keyword != '') {
            $this->like('naran_kompletos', $keyword);
            $this->orLike('fatin_moris', $keyword);
            $this->orLike('loron_moris', $keyword);
            $this->orLike('numero_eleitural', $keyword);
            $this->orLike('status_servisu', $keyword);
            $this->orLike('jenero', $keyword);
        }
        $this->orderBy('id_estudante_registo', 'DESC');
        return [
            'estudante' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }

    public function filterestudanteregisto($num){
         $this->join('estudante', 'estudante_registo.conta_estudante_registo = estudante.id_estudante', 
        'naran_kompletos', 'loron_moris', 'image_estudante', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'estudante.sistema_estudante = sistema.id_sistema', 
        'sistema', 'left');
        $request        = \Config\Services::request();
        $start          = $request->getGet('start');
        $end            = $request->getGet('end');
        $this->where('data_estudante_registo >=', $start);
        $this->where('data_estudante_registo <=', $end);
        return [
            'estudante' =>$this->paginate($num),
            'pager'   =>$this->pager,
        ];
    }
    public function estudanteregisto()
    {
        
        $this->join('estudante', 'estudante_registo.conta_estudante_registo = estudante.id_estudante', 
        'naran_kompletos', 'loron_moris', 'image_estudante', 'fatin_moris', 'status_servisu', 'numero_eleitural', 'jenero', 'left');
        $this->join('sistema', 'estudante.sistema_estudante = sistema.id_sistema', 
        'sistema', 'left');

        $query = $this->first(); 
        return $query;
    }
}
