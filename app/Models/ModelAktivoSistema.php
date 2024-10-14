<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAktivoSistema extends Model
{
    protected $table            = 'administrator';
    protected $primaryKey       = 'id_administrator';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['valido_administrator'];

    // public function toggle_update_user($table, $pk, $id, $data)
    // {
    //     $this->db->where($pk, $id);
    //     $update = $this->db->update($table, $data);
    //     return $result;
    // }
    public function toggle_administrator($table, $data = null, $where = null)
    {
        if ($data != null) {
           $row = $this->getWhere($table, $data)->getRow();
           return $row;
        }else {
            $result = $this->getWhere($table, $where)->getResult();

            return $result;
        }
    }
    public function toggle_update_administrator($table, $pk, $id, $data)
    {
        $query = $this->db->table($this->table)->where($pk, $id)->update($table, $data);
        return $query;
    }
}
