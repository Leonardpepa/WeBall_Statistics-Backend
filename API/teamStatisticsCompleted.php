<?php

    include_once "../php/config.php";
    include "service/teamStatisticsCompletedService.php";
    include "utils/validation.php";

    $mysqli->select_db("championship");
    $teamCompletedStatsService = new TeamStatisticsCompletedService("team_championship_statistics", $mysqli);
        
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        $data = "";
        $team_id = "";
        if(isset($_GET["team_id"]) ){
            $team_id = test_input($_GET["team_id"]);
        }
        
        if($team_id){
            $data = $teamCompletedStatsService->findTeamCompletedStatsByTeamId($team_id);
        }else{
            $data = $teamCompletedStatsService->findAllTeamCompletedStats();
        }
        
        header("Content-Type: application/json");
        echo json_encode($data);
    }else if($_SERVER['REQUEST_METHOD'] == "DELETE"){
        $data = "";
        $team_id = "";
        
        if(isset($_GET["team_id"]) ){
            $team_id = test_input($_GET["team_id"]);
        }

        if($team_id){
            $data = $teamCompletedStatsService->deleteTeamCompletedStatsById($team_id);
        }else{
            $data = $teamCompletedStatsService->deleteAllTeamCompletedStats();
        }
        
        header("Content-Type: application/json");
        echo json_encode($data);
    }else if($_SERVER['REQUEST_METHOD'] == "PUT"){
        
        $entityBody = file_get_contents('php://input');
        
        $teamStatsProvided = json_decode($entityBody);

        $data = $teamCompletedStatsService->updateTeamCompletedStats($teamStatsProvided);
        
        header("Content-Type: application/json");
        echo json_encode($data);
    }else if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $entityBody = file_get_contents('php://input');
        
        $teamStatsProvided = json_decode($entityBody);

        $data = $teamCompletedStatsService->saveTeamCompletedStats($teamStatsProvided);
        
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    $mysqli->close();

?>
