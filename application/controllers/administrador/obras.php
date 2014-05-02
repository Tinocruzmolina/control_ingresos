<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class Obras extends CI_Controller {

  function __construct()
  {
	
    parent::__construct();
	$this->load->helper('url');
	$this->load->model('modelo');
	$this->load->library('grocery_crud');	
	$this->load->library(array('session'));
	
	if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
    {
       redirect(base_url().'index.php/login');
    }			    
		
  }

  function index()
  {    
    redirect('administrador/obras/principal/1');			
  }
    
  
  function principal($tipo){
	  try{	
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		$crud->set_table('ci_obra');
		$crud->set_subject('Obra');		
		$crud->set_language('spanish');
		
		$crud->fields(			
		   'nombre_obra'
		);
		
		$crud->columns('nombre_obra');
		
		//$crud->display_as('cuenta','Cuenta')->display_as('monto','Monto')->display_as('fecha','Fecha');
		
		$crud->required_fields( 'nombre_obra');
		
		
		$crud->edit_fields('nombre_obra');	
		
		$crud->unset_add();
		$crud->unset_export();
		$crud->unset_print();
		
						
		//$crud->set_field_upload('acta_constitutiva','archivos/actas_constitutivas');
		//$crud->set_field_upload('curriculum_empresarial','archivos/curriculum_empresarial');
		//$crud->set_field_upload('ficha_tecnica','archivos/fichas_tecnica');
		//$crud->set_field_upload('tarifario','archivos/tarifarios');	
		
		if($tipo==1){
		$crud->add_action('Estimaciónes',base_url().'imagenes/detalle.png','','',array($this,'url_estimaciones'));
		}
		if($tipo==2){
		$crud->add_action('Listas de raya',base_url().'imagenes/contratos.png','','',array($this,'url_listas_raya'));
		}
		
		$crud->add_action('Ver todos los datos',base_url().'imagenes/lupa.gif','','',array($this,'detalle_registro'));							
		
		$crud->where('tipo_obra',$tipo);
			  
		$output = $crud->render();			
		$data['opcion'] = 'obras';		
		$data['nombre_usuario'] = $this->modelo->nombre_usuario($this->session->userdata('id_usuario'));
	  	$this->load->view('administrador/cabecera', $data);
		
		if($tipo==1){
		$data['opcion_obras'] = 'ver_todos';	  
		$this->load->view('administrador/opciones_obras', $data);
		}
		if($tipo==2){
		$data['opcion_obras'] = 'ver_todos_admon';
		$this->load->view('administrador/opciones_obras', $data);
		}
	  	
		//$data['output'] = $output;
		//$data['opcion_medios'] = 'ver_todos';	
		$this->load->view('grocery', $output);
		$this->load->view('pie');				
		
		}catch(Exception $e){
		  show_error($e->getMessage().' --- '.$e->getTraceAsString());
    	}
	
  }
  
  function url_estimaciones($primary_key , $row)
  {
    return site_url('administrador/aportaciones/principal').'/'.$row->id_obra;
  }
  
  function url_listas_raya($primary_key , $row)
  {
    return site_url('administrador/aportaciones/principal').'/'.$row->id_obra;
  }
  
  function detalle_registro($primary_key , $row)
  {
    return site_url('administrador/aportaciones/principal').'/'.$row->id_obra;
  }
     
  
  function nuevo(){
	  			
		$data['opcion'] = 'obras';	  
		$data['nombre_usuario'] = $this->modelo->nombre_usuario($this->session->userdata('id_usuario'));
	  	$this->load->view('administrador/cabecera', $data);
		$data['opcion_obras'] = 'nueva_obra';	  
	  	$this->load->view('administrador/opciones_obras', $data);
		//$data['output'] = $output;
		$data['tipo_obra'] = 1;	
		$this->load->view('administrador/nuevaobra',$data);
		$this->load->view('pie');				
		
  }	
  
  function guardar(){
	  
	  $nombre = $this->input->post('nombre');
	  $latitud = $this->input->post('latitud');
	  $altitud = $this->input->post('altitud');
	  $tipo_obra = $this->input->post('tipo_obra');
	  
	  $datos = array(
			'nombre_obra' => $nombre ,
			'latitud' => $latitud ,
			'altitud' => $altitud,
			'tipo_obra' => $tipo_obra
	   );
	   
	   $this->modelo->guardar_obra($datos);
	   
	   if($tipo_obra==1){
	   redirect('administrador/obras/principal/2');
	   }
	   if($tipo_obra==2){
	   redirect('administrador/obras/principal/2');
	   }
  }
  
  function nuevo_admon(){
	  			
		$data['opcion'] = 'obras';	  
		$data['nombre_usuario'] = $this->modelo->nombre_usuario($this->session->userdata('id_usuario'));
	  	$this->load->view('administrador/cabecera', $data);
		$data['opcion_obras'] = 'nueva_obra_admon';	  
	  	$this->load->view('administrador/opciones_obras', $data);
		//$data['output'] = $output;
		$data['tipo_obra'] = 2;	
		$this->load->view('administrador/nuevaobra',$data);
		$this->load->view('pie');				
		
  }	  
  
}