<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Parking_reservation extends CI_Controller{



	public function __construct()
	{

		parent::__construct();

		$this->load->model( 'parking_model', 'parking' );

		$this->load->model( 'users_model', 'users' );

		$this->load->helper( 'functions' );

		$this->load->library('encrypt');
	}





/**
* ------------------------------------------------------------------------------------------
* Page parking informations
* ------------------------------------------------------------------------------------------
*
* General information
*
* @var strings
*
* @param $flag flag of the current country
* @param $idParking parking id
*/

	public function index( $flag, $idParking )
	{
 
   		if( $this->parking->parkingExists( $flag, $idParking ) )
  		{

	  		$infos = array(

	 							'parking'   => $this->parking->informationsParking( $flag, $idParking ),
	 							'prices'    => $this->parking->pricesParking( $idParking ),
	 							'photos'    => $this->parking->allPhotosParking( $idParking ),
	 							'hoursWeek' => $this->parking->viewHoursWeeks( $idParking )
 	   						
	   						);

	 		$this->load->view( 'includes/html_header', $infos );

			$this->load->view( 'front/parking/page_informations_parking' );

	 		$this->load->view( 'includes/html_footer' );

  		}else{

  			redirect( base_url() );
  		}



 	}










/**
* ------------------------------------------------------------------------------------------
* Page parking reservation
* ------------------------------------------------------------------------------------------
*
* General information
*
* @var strings
*
* @param $flag flag of the current country
* @param $idParking parking id
*/

	public function complete_reservation( $flag, $idParking )
	{


 		if( $this->parking->parkingExists( $flag, $idParking ) )
  		{

	 		$detail = array(
	 							'user'                => $this->users->showInformation( $this->session->userdata( 'idUser' ) ),
	 							'car'                 => $this->users->showCar( $this->session->userdata( 'idUser' ) ),
	 							'parking'             => $this->parking->informationsParking( $flag, $idParking ),
	 							'products'            => $this->parking->selectProducts( $idParking )

	   						 );


	 		$this->load->view( 'includes/html_header' , $detail );

			$this->load->view( 'front/parking/page_reservation');

	 		$this->load->view( 'includes/html_footer' );

  		}else{

  			redirect( base_url() );
  		}

 	}
  












/**
* ------------------------------------------------------------------------------------------
* Page list parking for category 
* ------------------------------------------------------------------------------------------
*
* General information
*
* @var strings
*
* @param $flag flag of the current country
* @param $locale parking location
*/

 	public function list_parkings( $flag, $locale )
 	{
 


 		$parks = array( 

 						'list'     => $this->parking->allParkings( $flag , separateFirst( $locale )  ),
 						'category' => $this->parking->allCategoryParking() 

 					  );

 		$this->load->view( 'includes/html_header', $parks );

		$this->load->view( 'front/parking/page_list_parking');

 		$this->load->view( 'includes/html_footer' ); 

 


 
    }




















/**
* ------------------------------------------------------------------------------------------
* Check if there are products available according to the date
* ------------------------------------------------------------------------------------------
*
*
*/

 	public function check_products_dates()
 	{


        header("Access-Control-Allow-Origin: *");
        
 		$idParking = $this->input->get( 'idparking');
 		$dateStart = dateUs( $this->input->get( 'datestart') );
 		$dateEnd   = dateUs( $this->input->get( 'datexit') );

 		$products  = $this->parking->dateRangeProducts( $idParking, $dateStart, $dateEnd );
 		 
		echo json_encode( $products );
 
    }

















/**
* ------------------------------------------------------------------------------------------
* Page ending reservation voucher
* ------------------------------------------------------------------------------------------
*
*
*/

 	public function voucher()
 	{

 		$parks = array( 

 						'list' => $this->parking->allParkings() 

 					  );

 
		$this->load->view( 'front/parking/page_voucher');

 
 
    }
























}
 