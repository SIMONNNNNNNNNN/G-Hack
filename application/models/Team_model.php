<?php

//functions for database CRUD operations related to teams
class Team_model extends CI_Model {

    //returns the team name based on the team_id.
	public function getTeamName($team_id) {
		$query = $this->db->select('name')
       		->where('team_id', $team_id)
            ->get('team');
        $row = $query->row();
        if (isset($row)) {
            return $row->name;
        }else{
            return false;
        }
	}

	public function getTeamid($captain) {
		$query = $this->db->select('team_id')
					->where('captain', $captain)
						->get('team');
				$row = $query->row();
				if (isset($row)) {
						return $row->team_id;
				}else{
						return false;
				}
	}
    //creates a team in the database with generic name and updates team creator's account with team id
    //return team_id of the created team
    public function create_generic_team($email) {

        //get account id of the user
        $account_id = $this->account_model->get_account_id($email);

        //insert new team row with captain as user
        $data = array(
            'captain' => $account_id
        );
        $this->db->insert('team', $data);

        //gets the team_id of the insert (auto-incrementing sequence)
        $team_id = $this->db->insert_id();

        //Update team name with generic name
        $data = array(
            'name' => 'New team ' . $team_id
        );
        $this->db->where('team_id', $team_id)
                      ->update('team', $data);

        //update user's account with team id
        $data = array(
            'team_id' => $team_id
        );
        $this->db->where('email_address', $email)
                      ->update('account', $data);

        return $team_id;
    }
}

?>
