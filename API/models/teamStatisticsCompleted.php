<?php
    //     `team_id` int(12) UNSIGNED NOT NULL,
    //     `total_matches`int(24) UNSIGNED NOT NULL,
    //     `win` int UNSIGNED NOT NULL,
    //     `lose` int UNSIGNED NOT NULL,
    //     `succesful_effort` int UNSIGNED NOT NULL,
    //     `total_effort` int UNSIGNED NOT NULL,
    //     `successful_freethrow`int UNSIGNED NOT NULL,
    //     `total_freethrow` int UNSIGNED NOT NULL,
    //     `succesful_twopointer` int UNSIGNED NOT NULL,
    //     `total_twopointer` int UNSIGNED NOT NULL,
    //     `succesful_threepointer` int UNSIGNED NOT NULL,
    //     `total_threepointer` int UNSIGNED NOT NULL,
    //     `steel` int UNSIGNED NOT NULL,
    //     `assist` int UNSIGNED NOT NULL,
    //     `block` int UNSIGNED NOT NULL,
    //     `rebound` int UNSIGNED NOT NULL,
    //     `foul` int UNSIGNED NOT NULL,
    //     `turnover`int UNSIGNED NOT NULL
    //   ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    class TeamStatisticsCompleted {

        public $team_id;
        public $team_name;
        public $total_matches;
        public $win;
        public $lose;
        public $succesful_effort;
        public $total_effort;
        public $successful_freethrow;
        public $total_freethrow;
        public $succesful_twopointer;
        public $total_twopointer;
        public $succesful_threepointer;
        public $total_threepointer;
        public $steel;
        public $assist;
        public $block;
        public $rebound;
        public $foul;
        public $turnover;

        public function __construct($team_id, $total_matches, $win, $lose, $succesful_effort, $total_effort, $successful_freethrow, 
        $total_freethrow, $succesful_twopointer, $total_twopointer, $succesful_threepointer, $total_threepointer, $steel, $assist, 
        $block, $rebound, $foul, $turnover, $mysqli){
            $this->team_id = $team_id;
            $this->team_name = $this->get_team_name($mysqli);
            $this->total_matches = $total_matches;
            $this->win = $win;
            $this->lose = $lose;
            $this->succesful_effort = $succesful_effort;
            $this->total_effort = $total_effort;
            $this->successful_freethrow = $successful_freethrow;
            $this->total_freethrow = $total_freethrow;
            $this->succesful_twopointer = $succesful_twopointer;
            $this->total_twopointer = $total_twopointer;
            $this->succesful_threepointer = $succesful_threepointer;
            $this->total_threepointer = $total_threepointer;
            $this->steel = $steel;
            $this->assist = $assist;
            $this->block = $block;
            $this->rebound = $rebound;
            $this->foul = $foul;
            $this->turnover = $turnover;
        }

        //Getting the team name by the id
        function get_team_name($mysqli) {
            $sql = "SELECT * FROM `team` WHERE `id` = $this->team_id";
            $result = $mysqli->query($sql);
            //Check if team with this id found
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row["name"];
            }
            return null;
        }
    };

?>