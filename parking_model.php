<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Parking_model extends CI_Model{


	public function __construct()
	{
		parent::__construct();
	}





/**
* ------------------------------------------------------------------------------------------
* Function model select parking information
* ------------------------------------------------------------------------------------------
*
* information sent by the controller to function select parking
*
*
*/

    public function informationsParking( $flag, $idParking )
    {
        
       return $this->db->select( '*' )->from( 'p_parking' )->where( array( 'id_pkg' => $idParking , 'parking_flag' => $flag ) )->get()->result();
 
    }











/**
* ------------------------------------------------------------------------------------------
* Function model select parking products
* ------------------------------------------------------------------------------------------
*
* information sent by the controller to function select parking products
*
*
*/

    public function selectProducts( $idParking )
    {
        
        return $this->db->select( '*' )->from( 'p_parking_products' )->where( 'id_parking', $idParking )->get()->result();

    }













/**
* ------------------------------------------------------------------------------------------
* Function model select parking hours and week
* ------------------------------------------------------------------------------------------
*
*
*
*/

    public function viewHoursWeeks( $idParking )
    {
        
        return $this->db->select( '*' )->from( 'p_parking_week_hours' )->where( 'id_parking_wh', $idParking )->get()->result();

    }


















/**
* ------------------------------------------------------------------------------------------
* Function model select all parkings
* ------------------------------------------------------------------------------------------
*
*
*
*/

    public function allParkings( $flag, $locale )
    {
        
        return $this->db->select( '*' )->from( 'p_parking' )->where( array( 'parking_flag' => $flag, 'parking_locale_url' => $locale ) )->get()->result();

    }



















/**
* ------------------------------------------------------------------------------------------
* Function model select all category parkings
* ------------------------------------------------------------------------------------------
*
*
*
*/

    public function allCategoryParking( $limit = null )
    {
        
        if( empty( $limit ) ){
       
            return $this->db->select( '*' )->from( 'p_category' )->get()->result();

        }else{

            return $this->db->select( '*' )->from( 'p_category' )->limit( $limit )->get()->result();

        }

    }

























/**
* ------------------------------------------------------------------------------------------
* Function check exist parking
* ------------------------------------------------------------------------------------------
*
*
*
*/
    public function parkingExists( $flag, $idParking )
    {
        
       $exists = $this->db->select( '*' )->from( 'p_parking' )->where( array(  'id_pkg' => $idParking , 'parking_flag' => $flag ) )->get()->result();

       return count( $exists ) >= 1 ? true : false;

    }











/**
* ------------------------------------------------------------------------------------------
* Function pick up id of the parking spaces of each parking lot to be made reservations
* ------------------------------------------------------------------------------------------
*
* information sent by the controller to function select parking
*
*
*/

    function selectAvailableVacancies( $idParking )
    {
         
         
        if( $idParking != null && is_numeric( $idParking ) )
        {

             return $this->db->select( 'id_vp, vacancy_type' )->from("p_vacancies_parking")->where( 'id_vacancy_parking', $idParking )->where( 'vacancy_status', 1 )->get()->result();       


        }else{

            return false;
        }

 
        
    }












/**
* ------------------------------------------------------------------------------------------
* Function to select type of parking spaces
* ------------------------------------------------------------------------------------------
*
*
*
*/

    function selectTypeVacancy( $idParking )
    {
         
        if( $idParking != null && is_numeric( $idParking ) )
        {

            return $this->db->select('id_pkg, parking_type_vacancy, parking_value_covered,parking_value_find' )->from("p_parking")->where( 'id_pkg', $idParking )

                   ->get()->result();       

        }else{

            return false;
        }

 
        
    }










/**
* ------------------------------------------------------------------------------------------
* Function select prices parking
* ------------------------------------------------------------------------------------------
*
*
*
*/

    function pricesParking( $idParking )
    {
         
        if( $idParking != null && is_numeric( $idParking ) )
        {

            return $this->db->select('*' )->from("p_parking_rates")->where( 'id_parking_price', $idParking )->get()->result();       

        }else{

            return false;
        }

 
        
    }












/**
* ------------------------------------------------------------------------------------------
* Function model select all parkings photos
* ------------------------------------------------------------------------------------------
*
*
*
*/

    public function allPhotosParking( $idParking )
    {
        
        if( $idParking != null )
        {

            return $this->db->select( '*' )->from( 'p_parking_photos' )->where( 'id_parking_photo', $idParking )->get()->result();

        }else{

            return false;
        }

    }



 







/**
* ------------------------------------------------------------------------------------------
* Function model list products according to date range
* ------------------------------------------------------------------------------------------
*
*
*
*/

    public function dateRangeProducts( $idParking, $dateStart, $dateEnd )
    {
        
        if( $idParking != null )
        {

            return $this->db->select( 'p_parking_products.id_parking,p_parking_products.product_type, p_parking_products.product_date_start, p_parking_products.product_date_end,
                                       p_parking_products.product_rate_service, p_parking_products.product_active' )->from( 'p_parking_products' )->where( 'p_parking_products.id_parking', $idParking )
                                      ->where( 'p_parking_products.product_date_start BETWEEN "' . $dateStart . '" AND "'. $dateEnd . '"' )->where( 'p_parking_products.product_active', 1 )->get()->result();
                
        }else{

            return false;
        }

    }













/**
* ------------------------------------------------------------------------------------------
* Function select parking
* ------------------------------------------------------------------------------------------
*
* @var strings
* @param $search select parking through the name
*
*/
 
   public function searchParking( $search )
   {

        return $this->db->select( '*' )->from( 'p_parking' )->like( 'parking_name', $search , 'both' )->or_like( 'parking_address', $search , 'both' )->get()->result(); 

   }





/**
* ------------------------------------------------------------------------------------------
* Function check number of parking spaces
* ------------------------------------------------------------------------------------------
*
* @var strings
* @param $idParking id of the parking 
*
*/

    // public function quantityVacanciesForParking( $idParking )
    // {
        
    //     return $this->db->where( 'id_vacancy_parking' , $idParking )->where( 'vacancy_status', 0 )->from("p_vacancies_parking")->count_all_results();

    // }


    // public function vacanciesTypeCovered( $idParking )
    // {
        
    //     return $this->db->where( 'id_vacancy_parking' , $idParking )->where( 'vacancy_type', 'C' )->from("p_vacancies_parking")->count_all_results();

    // }


    // public function vacanciesTypeFind( $idParking )
    // {
        
    //     return $this->db->where( 'id_vacancy_parking' , $idParking )->where( 'vacancy_type', 'D' )->from("p_vacancies_parking")->count_all_results();

    // }


    // public function vacanciesReservationFind( $idParking )
    // {
        
    //     return $this->db->where( 'id_vacancy_parking' , $idParking )->where( 'vacancy_type_reservation', 'D' )->from("p_vacancies_parking")->count_all_results();

    // }


    // public function vacanciesReservationCovered( $idParking )
    // {
        
    //     return $this->db->where( 'id_vacancy_parking' , $idParking )->where( 'vacancy_type_reservation', 'C' )->from("p_vacancies_parking")->count_all_results();

    // }    


















}
 