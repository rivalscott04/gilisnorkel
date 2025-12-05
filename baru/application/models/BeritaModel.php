<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BeritaModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
	}
	
	public function getData(){
	
		$sql = "select * from vw_news order by id desc";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return null;
		}

	}

	public function getDataById($id){
		$sql = "select * from vw_news where id='$id'";
		$query = $this->db->query($sql);

		return $query->row();
	
	}
	public function SimpanData($jdl,$ket,$foto,$depan,$kat){
		$this->db->trans_start();
		$this->db->query("insert into news (judul,tgl,keterangan,foto,depan,kategori) values('$jdl',now(),'$ket','$foto','$depan','$kat')");
		$this->db->trans_complete();

		return $this->db->trans_status();
	}

	public function UbahData($id,$jdl,$ket,$foto,$depan,$kat){
		$this->db->trans_start();
		$this->db->query("Update news set judul='$jdl',keterangan='$ket',foto='$foto',depan='$depan',kategori='$kat' where id='$id'");
		$this->db->trans_complete();

		return $this->db->trans_status();
	}

	public function HapusData($id){
		$this->db->trans_start();
		$this->db->query("delete from news where id='$id'");
		$this->db->trans_complete();

		return $this->db->trans_status();
	}
// PAGINATION 
	public function getTotalData(){
		$sql = "select count(id) as TotalData from vw_news";
		$query = $this->db->query($sql);	
		return $query->row();
	}
	public function getDataPage($start=0,$limit=0){
		if($limit>0){
			$sql = "select * from vw_news order by id desc limit $start,$limit";
			$query = $this->db->query($sql);
			return $query->result_array();
		}else{
			return null;
		}
	}

	public function getCariTotalData($cari){
		$sql = "select count(id) as TotalData from vw_news where keterangan like '%$cari%' or judul like '%$cari%' or kategori like '%$cari%' order by id desc";
		$query = $this->db->query($sql);
		return $query->row();
	}

	public function getCariDataPage($cari,$start=0,$limit=0){
		if($limit>0){
			$sql = "select * from vw_news where keterangan like '%$cari%' or judul like '%$cari%' or kategori like '%$cari%' order by id desc limit $start,$limit";
			$query = $this->db->query($sql);
			return $query->result_array();
		}else{
			return null;
		}
	}

	public function getTagTotalData($id){
		$sql = "select count(id) as TotalData from vw_news where kategori='$id' order by id desc";
		$query = $this->db->query($sql);
		return $query->row();
	}

	public function getTagDataPage($id,$start=0,$limit=0){
		if($limit>0){
			$sql = "select * from vw_news where kategori='$id' order by id desc limit $start,$limit";
			$query = $this->db->query($sql);
			return $query->result_array();
		}else{
			return null;
		}
	}
}

?>