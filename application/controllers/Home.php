<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('home');
	}

	public function search()
	{
	    $values = $this->input->get();
        $json = file_get_contents('https://swapi.co/api/starships');
        $items = json_decode($json, TRUE);

        $data = '<table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Espaçonave</th>
                            <th scope="col">Paradas</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($items['results'] as $item){
            $stops = $values['distance']/$item['MGLT'];
            $data .= '<tr>';
            $data .= '<td>'.$item['name'].'</td>';
            $data .= '<td>'.ceil($stops).'</td>';
            $data .= '</tr>';
        }

        $data .= '</tbody>
                </table>';
        echo $data;

	}
}
