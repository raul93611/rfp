<?php
class ProjectRepository{
  public static function insert_project($connection, $project){
    if(isset($connection)){
      try{
        $sql = 'INSERT INTO projects (id_user, start_date, code, link, project_name, end_date, priority, description, submission_instructions, type, flowchart, designated_user, reviewed_project, priority_color, subject, result, proposed_price, business_type, submitted, follow_up, award, submitted_date, award_date, expiration_date, address, ship_to, total_service, total_equipment, members, previous_contract) VALUES(:id_user, NOW(), :code, :link, :project_name, :end_date, :priority, :description,  :submission_instructions, :type, :flowchart, :designated_user, :reviewed_project, :priority_color, :subject, :result, :proposed_price, :business_type, :submitted, :follow_up, :award, :submitted_date, :award_date, :expiration_date, :address, :ship_to, :total_service, :total_equipment, :members, :previous_contract)';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_user', $project-> get_id_user(), PDO::PARAM_STR);
        $sentence-> bindParam(':code', $project-> get_code(), PDO::PARAM_STR);
        $sentence-> bindParam(':link', $project-> get_link(), PDO::PARAM_STR);
        $sentence-> bindParam(':project_name', $project-> get_project_name(), PDO::PARAM_STR);
        $sentence-> bindParam(':end_date', $project-> get_end_date(), PDO::PARAM_STR);
        $sentence-> bindParam(':priority', $project-> get_priority(), PDO::PARAM_STR);
        $sentence-> bindParam(':description', $project-> get_description(), PDO::PARAM_STR);
        $sentence-> bindParam(':submission_instructions', $project-> get_submission_instructions(), PDO::PARAM_STR);
        $sentence-> bindParam(':type', $project-> get_type(), PDO::PARAM_STR);
        $sentence-> bindParam(':flowchart', $project-> get_flowchart(), PDO::PARAM_STR);
        $sentence-> bindParam(':designated_user', $project-> get_designated_user(), PDO::PARAM_STR);
        $sentence-> bindParam(':reviewed_project', $project-> get_reviewed_project(), PDO::PARAM_STR);
        $sentence-> bindParam(':priority_color', $project-> get_priority_color(), PDO::PARAM_STR);
        $sentence-> bindParam(':subject', $project-> get_subject(), PDO::PARAM_STR);
        $sentence-> bindParam(':result', $project-> get_result(), PDO::PARAM_STR);
        $sentence-> bindParam(':proposed_price', $project-> get_proposed_price(), PDO::PARAM_STR);
        $sentence-> bindParam(':business_type', $project-> get_business_type(), PDO::PARAM_STR);
        $sentence-> bindParam(':submitted', $project-> get_submitted(), PDO::PARAM_STR);
        $sentence-> bindParam(':follow_up', $project-> get_follow_up(), PDO::PARAM_STR);
        $sentence-> bindParam(':award', $project-> get_award(), PDO::PARAM_STR);
        $sentence-> bindParam(':submitted_date', $project-> get_submitted_date(), PDO::PARAM_STR);
        $sentence-> bindParam(':award_date', $project-> get_award_date(), PDO::PARAM_STR);
        $sentence-> bindParam(':expiration_date', $project-> get_expiration_date(), PDO::PARAM_STR);
        $sentence-> bindParam(':address', $project-> get_address(), PDO::PARAM_STR);
        $sentence-> bindParam(':ship_to', $project-> get_ship_to(), PDO::PARAM_STR);
        $sentence-> bindParam(':total_service', $project-> get_total_service(), PDO::PARAM_STR);
        $sentence-> bindParam(':total_equipment', $project-> get_total_equipment(), PDO::PARAM_STR);
        $sentence-> bindParam(':members', $project-> get_members(), PDO::PARAM_STR);
        $sentence-> bindParam(':previous_contract', $project-> get_previous_contract(), PDO::PARAM_STR);
        $result = $sentence-> execute();
        $id = $connection-> lastInsertId();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $id;
  }

  public static function get_all_unreviewed_projects($connection){
    if(isset($connection)){
      try{
        $sql = 'SELECT id, start_date as start, link as title FROM projects WHERE reviewed_project = 0 AND previous_contract = 0';
        $sentence = $connection-> prepare($sql);
        $sentence->execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $result;
  }

  public static function get_all_end_dates_reviewed_projects($connection){
    if(isset($connection)){
      try{
        $sql = 'SELECT id, project_name as title, end_date as start, priority_color as color FROM projects WHERE reviewed_project = 1 AND submitted = 0 AND previous_contract = 0';
        $sentence = $connection-> prepare($sql);
        $sentence-> execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $result;
  }

  public static function get_all_end_dates_my_projects($connection, $id_user){
    $id_user = '%' . $id_user . '%';
    if(isset($connection)){
      try{
        $sql = 'SELECT id, project_name as title, end_date as start, priority_color as color, reviewed_project FROM projects WHERE reviewed_project = 1 AND members LIKE :id_user AND submitted = 0 AND previous_contract = 0';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $result;
  }

  public static function get_all_new_dates_my_projects($connection, $id_user){
    $id_user = '%' . $id_user . '%';
    if(isset($connection)){
      try{
        $sql = 'SELECT id, link as title, start_date as start, reviewed_project FROM projects WHERE reviewed_project = 0 AND members LIKE :id_user AND previous_contract = 0';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $result;
  }

  public static function set_members($connection, $members, $id_project){
    if(isset($connection)){
      try{
        $sql = 'UPDATE projects SET members = :members WHERE id = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':members', $members, PDO::PARAM_STR);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function change_main_information_project($connection, $code, $project_name, $business_type, $end_date, $priority, $priority_color, $submission_instructions, $subject, $address, $ship_to, $description, $id_project){
    if(isset($connection)){
      try{
        $sql = 'UPDATE projects SET code = :code, project_name = :project_name, business_type = :business_type, end_date = :end_date, priority = :priority, priority_color = :priority_color, submission_instructions = :submission_instructions, subject = :subject, address = :address, ship_to = :ship_to, description = :description WHERE id = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':code', $code, PDO::PARAM_STR);
        $sentence-> bindParam(':project_name', $project_name, PDO::PARAM_STR);
        $sentence-> bindParam(':business_type', $business_type, PDO::PARAM_STR);
        $sentence-> bindParam(':end_date', $end_date, PDO::PARAM_STR);
        $sentence-> bindParam(':priority', $priority, PDO::PARAM_STR);
        $sentence-> bindParam(':priority_color', $priority_color, PDO::PARAM_STR);
        $sentence-> bindParam(':submission_instructions', $submission_instructions, PDO::PARAM_STR);
        $sentence-> bindParam(':subject', $subject, PDO::PARAM_STR);
        $sentence-> bindParam(':address', $address, PDO::PARAM_STR);
        $sentence-> bindParam(':ship_to', $ship_to, PDO::PARAM_STR);
        $sentence-> bindParam(':description', $description, PDO::PARAM_STR);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function fill_out_project($connection, $id_project, $code, $project_name, $end_date, $priority, $description, $submission_instructions, $type, $priority_color, $subject, $business_type){
    if(isset($connection)){
      try{
        $sql = 'UPDATE projects SET code = :code, project_name = :project_name, end_date = :end_date, priority = :priority, description = :description, submission_instructions = :submission_instructions, type = :type, priority_color = :priority_color, subject = :subject, business_type = :business_type WHERE id = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':code', $code, PDO::PARAM_STR);
        $sentence-> bindParam(':project_name', $project_name, PDO::PARAM_STR);
        $sentence-> bindParam(':end_date', $end_date, PDO::PARAM_STR);
        $sentence-> bindParam(':priority', $priority, PDO::PARAM_STR);
        $sentence-> bindParam(':description', $description, PDO::PARAM_STR);
        $sentence-> bindParam(':submission_instructions', $submission_instructions, PDO::PARAM_STR);
        $sentence-> bindParam(':type', $type, PDO::PARAM_STR);
        $sentence-> bindParam(':priority_color', $priority_color, PDO::PARAM_STR);
        $sentence-> bindParam(':subject', $subject, PDO::PARAM_STR);
        $sentence-> bindParam(':business_type', $business_type, PDO::PARAM_STR);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $result = $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function change_designated_user($connection, $designated_user, $id_project){
    if(isset($connection)){
      try{
        $sql = 'UPDATE projects SET designated_user = :designated_user WHERE id = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':designated_user', $designated_user, PDO::PARAM_STR);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function get_project_by_id($connection, $id_project){
    $project = null;
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM projects WHERE id = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
          $project = new Project($result['id'], $result['id_user'], $result['start_date'], $result['code'], $result['link'], $result['project_name'], $result['end_date'], $result['priority'], $result['description'], $result['submission_instructions'], $result['type'], $result['flowchart'], $result['designated_user'], $result['reviewed_project'], $result['priority_color'], $result['subject'], $result['result'], $result['proposed_price'], $result['business_type'], $result['submitted'], $result['follow_up'], $result['award'], $result['submitted_date'], $result['award_date'], $result['expiration_date'], $result['address'], $result['ship_to'], $result['total_service'], $result['total_equipment'], $result['members'], $result['previous_contract']);
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $project;
  }

  public static function save_flowchart($connection, $flowchart_result, $priority_color, $id_project){
    if(isset($connection)){
      try{
        $sql = 'UPDATE projects SET flowchart = :flowchart, reviewed_project = 1, priority_color = :priority_color WHERE id = :id';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':flowchart', $flowchart_result, PDO::PARAM_STR);
        $sentence-> bindParam(':priority_color', $priority_color, PDO::PARAM_STR);
        $sentence-> bindParam(':id', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function get_all_projects($connection){
    $projects = [];
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM projects WHERE submitted = 0 AND reviewed_project = 1 ORDER BY end_date';
        $sentence = $connection-> prepare($sql);
        $sentence-> execute();
        $result = $sentence-> fetchAll();
        if(count($result)){
          foreach ($result as $row) {
            $projects[] = new Project($row['id'], $row['id_user'], $row['start_date'], $row['code'], $row['link'], $row['project_name'], $row['end_date'], $row['priority'], $row['description'], $row['submission_instructions'], $row['type'], $row['flowchart'], $row['designated_user'], $row['reviewed_project'], $row['priority_color'], $row['subject'], $row['result'], $row['proposed_price'], $row['business_type'], $row['submitted'], $row['follow_up'], $row['award'], $row['submitted_date'], $row['award_date'], $row['expiration_date'], $row['address'], $row['ship_to'], $row['total_service'], $row['total_equipment'], $row['members'], $row['previous_contract']);
          }
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $projects;
  }

  public static function get_search_results($connection, $search_term){
    $projects = [];
    $search_term = '%' . trim($search_term) . '%';
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM projects WHERE code LIKE :search_term OR id LIKE :search_term OR project_name LIKE :search_term OR description LIKE :search_term OR address LIKE :search_term OR ship_to LIKE :search_term';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':search_term', $search_term, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
        if(count($result)){
          foreach ($result as $row) {
            $projects[] = new Project($row['id'], $row['id_user'], $row['start_date'], $row['code'], $row['link'], $row['project_name'], $row['end_date'], $row['priority'], $row['description'], $row['submission_instructions'], $row['type'], $row['flowchart'], $row['designated_user'], $row['reviewed_project'], $row['priority_color'], $row['subject'], $row['result'], $row['proposed_price'], $row['business_type'], $row['submitted'], $row['follow_up'], $row['award'], $row['submitted_date'], $row['award_date'], $row['expiration_date'], $row['address'], $row['ship_to'], $row['total_service'], $row['total_equipment'], $row['members'], $row['previous_contract']);
          }
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $projects;
  }

  public static function submitted_award_award_by_amount_projects_by_month($connection){
    $submitted_projects_by_month = [];
    $award_projects_by_month = [];
    $award_by_amount_projects_by_month = [];
    if(isset($connection)){
      try{
        for ($i = 1; $i <= 12 ; $i++) {
          $sql = 'SELECT COUNT(*) as submitted_projects_by_month FROM projects WHERE submitted = 1 AND MONTH(submitted_date) =' . $i . ' AND YEAR(submitted_date) = YEAR(CURDATE()) AND previous_contract = 0';
          $sql1 = 'SELECT COUNT(*) as award_projects_by_month FROM projects WHERE submitted = 1 AND award = 1 AND MONTH(award_date) =' . $i . ' AND YEAR(award_date) = YEAR(CURDATE()) AND previous_contract = 0';
          $sql2 = 'SELECT SUM(total_service) as award_by_amount_projects_by_month FROM projects WHERE submitted = 1 AND award = 1 AND MONTH(award_date) =' . $i . ' AND YEAR(award_date) = YEAR(CURDATE())';

          $sentence = $connection-> prepare($sql);
          $sentence1 = $connection-> prepare($sql1);
          $sentence2 = $connection-> prepare($sql2);

          $sentence-> execute();
          $sentence1-> execute();
          $sentence2-> execute();

          $result = $sentence-> fetch(PDO::FETCH_ASSOC);
          $result1 = $sentence1-> fetch(PDO::FETCH_ASSOC);
          $result2 = $sentence2-> fetch(PDO::FETCH_ASSOC);

          if(!empty($result)){
            $submitted_projects_by_month[$i - 1] = $result['submitted_projects_by_month'];
          }else{
            $submitted_projects_by_month[$i - 1] = 0;
          }

          if(!empty($result1)){
            $award_projects_by_month[$i - 1] = $result1['award_projects_by_month'];
          }else{
            $award_projects_by_month[$i - 1] = 0;
          }

          if(!is_null($result2['award_by_amount_projects_by_month'])){
            $award_by_amount_projects_by_month[$i - 1] = $result2['award_by_amount_projects_by_month'];
          }else{
            $award_by_amount_projects_by_month[$i - 1] = 0;
          }
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return array($submitted_projects_by_month, $award_projects_by_month, $award_by_amount_projects_by_month);
  }

  public static function submitted_award_award_by_amount_projects_by_month_last_year($connection){
    $submitted_projects_by_month_last_year = [];
    $award_projects_by_month_last_year = [];
    $award_by_amount_projects_by_month_last_year = [];
    if(isset($connection)){
      try{
        for ($i = 1; $i <= 12 ; $i++) {
          $sql = 'SELECT COUNT(*) as submitted_projects_by_month_last_year FROM projects WHERE submitted = 1 AND MONTH(submitted_date) =' . $i . ' AND YEAR(submitted_date) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR)) AND previous_contract = 0';
          $sql1 = 'SELECT COUNT(*) as award_projects_by_month_last_year FROM projects WHERE submitted = 1 AND award = 1 AND MONTH(award_date) =' . $i . ' AND YEAR(award_date) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR)) AND previous_contract = 0';
          $sql2 = 'SELECT SUM(total_service) as award_by_amount_projects_by_month_last_year FROM projects WHERE submitted = 1 AND award = 1 AND MONTH(award_date) =' . $i . ' AND YEAR(award_date) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR))';

          $sentence = $connection-> prepare($sql);
          $sentence1 = $connection-> prepare($sql1);
          $sentence2 = $connection-> prepare($sql2);

          $sentence-> execute();
          $sentence1-> execute();
          $sentence2-> execute();

          $result = $sentence-> fetch(PDO::FETCH_ASSOC);
          $result1 = $sentence1-> fetch(PDO::FETCH_ASSOC);
          $result2 = $sentence2-> fetch(PDO::FETCH_ASSOC);

          if(!empty($result)){
            $submitted_projects_by_month_last_year[$i - 1] = $result['submitted_projects_by_month_last_year'];
          }else{
            $submitted_projects_by_month_last_year[$i - 1] = 0;
          }

          if(!empty($result1)){
            $award_projects_by_month_last_year[$i - 1] = $result1['award_projects_by_month_last_year'];
          }else{
            $award_projects_by_month_last_year[$i - 1] = 0;
          }

          if(!is_null($result2['award_by_amount_projects_by_month_last_year'])){
            $award_by_amount_projects_by_month_last_year[$i - 1] = $result2['award_by_amount_projects_by_month_last_year'];
          }else{
            $award_by_amount_projects_by_month_last_year[$i - 1] = 0;
          }
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return array($submitted_projects_by_month_last_year, $award_projects_by_month_last_year, $award_by_amount_projects_by_month_last_year);
  }

  public static function follow_up_and_no_follow_up($connection){
    $follow_up = 0;
    $no_follow_up = 0;
    if(isset($connection)){
      try{
        $sql = 'SELECT COUNT(*) AS follow_up FROM projects WHERE submitted = 1 AND follow_up = 1 AND award = 0 AND YEAR(submitted_date) = YEAR(CURDATE()) AND previous_contract = 0';
        $sql1 = 'SELECT COUNT(*) AS no_follow_up FROM projects WHERE submitted = 1 AND follow_up = 0 AND award = 0 AND YEAR(submitted_date) = YEAR(CURDATE()) AND previous_contract = 0';

        $sentence = $connection-> prepare($sql);
        $sentence1 = $connection-> prepare($sql1);

        $sentence-> execute();
        $sentence1-> execute();

        $result = $sentence-> fetch(PDO::FETCH_ASSOC);
        $result1 = $sentence1-> fetch(PDO::FETCH_ASSOC);

        if(!empty($result)){
          $follow_up = $result['follow_up'];
        }

        if(!empty($result1)){
          $no_follow_up = $result1['no_follow_up'];
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return array($follow_up, $no_follow_up);
  }

  public static function submitted_projects_by_priority($connection){
    $ocho_a = 0;
    $full_and_open = 0;
    $hubzone = 0;
    $small_business = 0;
    $sources_sought = 0;
    if(isset($connection)){
      try{
        $sql = 'SELECT COUNT(*) AS ocho_a FROM projects WHERE submitted = 1 AND priority = "8a" AND YEAR(submitted_date) = YEAR(CURDATE()) AND previous_contract = 0';
        $sql1 = 'SELECT COUNT(*) AS full_and_open FROM projects WHERE submitted = 1 AND priority = "full_and_open" AND YEAR(submitted_date) = YEAR(CURDATE()) AND previous_contract = 0';
        $sql2 = 'SELECT COUNT(*) AS hubzone FROM projects WHERE submitted = 1 AND priority = "hubzone" AND YEAR(submitted_date) = YEAR(CURDATE()) AND previous_contract = 0';
        $sql3 = 'SELECT COUNT(*) AS small_business FROM projects WHERE submitted = 1 AND priority = "small_business" AND YEAR(submitted_date) = YEAR(CURDATE()) AND previous_contract = 0';
        $sql4 = 'SELECT COUNT(*) AS sources_sought FROM projects WHERE submitted = 1 AND priority = "sources_sought" AND YEAR(submitted_date) = YEAR(CURDATE()) AND previous_contract = 0';

        $sentence = $connection-> prepare($sql);
        $sentence1 = $connection-> prepare($sql1);
        $sentence2 = $connection-> prepare($sql2);
        $sentence3 = $connection-> prepare($sql3);
        $sentence4 = $connection-> prepare($sql4);

        $sentence-> execute();
        $sentence1-> execute();
        $sentence2-> execute();
        $sentence3-> execute();
        $sentence4-> execute();

        $result = $sentence-> fetch(PDO::FETCH_ASSOC);
        $result1 = $sentence1-> fetch(PDO::FETCH_ASSOC);
        $result2 = $sentence2-> fetch(PDO::FETCH_ASSOC);
        $result3 = $sentence3-> fetch(PDO::FETCH_ASSOC);
        $result4 = $sentence4-> fetch(PDO::FETCH_ASSOC);

        if(!empty($result)){
          $ocho_a = $result['ocho_a'];
        }

        if(!empty($result1)){
          $full_and_open = $result1['full_and_open'];
        }

        if(!empty($result2)){
          $hubzone = $result2['hubzone'];
        }

        if(!empty($result3)){
          $small_business = $result3['small_business'];
        }

        if(!empty($result4)){
          $sources_sought = $result4['sources_sought'];
        }
       }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
      return array($ocho_a, $full_and_open, $hubzone, $small_business, $sources_sought);
    }
  }

  public static function submitted_projects_by_subject($connection){
    $av = 0;
    $it = 0;
    $logistics = 0;
    $sources_sought = 0;

    if(isset($connection)){
      try{
        $sql = 'SELECT COUNT(*) AS av FROM projects WHERE submitted = 1 AND subject = "av" AND YEAR(submitted_date) = YEAR(CURDATE()) AND previous_contract = 0';
        $sql1 = 'SELECT COUNT(*) AS it FROM projects WHERE submitted = 1 AND subject = "it" AND YEAR(submitted_date) = YEAR(CURDATE()) AND previous_contract = 0';
        $sql2 = 'SELECT COUNT(*) AS logistics FROM projects WHERE submitted = 1 AND subject = "logistics" AND YEAR(submitted_date) = YEAR(CURDATE()) AND previous_contract = 0';
        $sql3 = 'SELECT COUNT(*) AS sources_sought FROM projects WHERE submitted = 1 AND subject = "sources_sought" AND YEAR(submitted_date) = YEAR(CURDATE()) AND previous_contract = 0';

        $sentence = $connection-> prepare($sql);
        $sentence1 = $connection-> prepare($sql1);
        $sentence2 = $connection-> prepare($sql2);
        $sentence3 = $connection-> prepare($sql3);

        $sentence-> execute();
        $sentence1-> execute();
        $sentence2-> execute();
        $sentence3-> execute();

        $result = $sentence-> fetch(PDO::FETCH_ASSOC);
        $result1 = $sentence1-> fetch(PDO::FETCH_ASSOC);
        $result2 = $sentence2-> fetch(PDO::FETCH_ASSOC);
        $result3 = $sentence3-> fetch(PDO::FETCH_ASSOC);

        if(!empty($result)){
          $av = $result['av'];
        }

        if(!empty($result1)){
          $it = $result['it'];
        }

        if(!empty($result2)){
          $logistics = $result2['logistics'];
        }

        if(!empty($result3)){
          $sources_sought = $result3['sources_sought'];
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return array($av, $it, $logistics, $sources_sought);
  }

  public static function submitted_projects_by_result($connection){
    $cancelled = 0;
    $disqualified = 0;
    $loss = 0;
    $re_posted = 0;
    $to_be_determined = 0;
    if(isset($connection)){
      try{
        $sql = 'SELECT COUNT(*) AS cancelled FROM projects WHERE submitted = 1 AND result = "cancelled" AND YEAR(submitted_date) = YEAR(CURDATE()) AND previous_contract = 0';
        $sql1 = 'SELECT COUNT(*) AS disqualified FROM projects WHERE submitted = 1 AND result = "disqualified" AND YEAR(submitted_date) = YEAR(CURDATE()) AND previous_contract = 0';
        $sql2 = 'SELECT COUNT(*) AS loss FROM projects WHERE submitted = 1 AND result = "loss" AND YEAR(submitted_date) = YEAR(CURDATE()) AND previous_contract = 0';
        $sql3 = 'SELECT COUNT(*) AS re_posted FROM projects WHERE submitted = 1 AND result = "re_posted" AND YEAR(submitted_date) = YEAR(CURDATE()) AND previous_contract = 0';
        $sql4 = 'SELECT COUNT(*) AS to_be_determined FROM projects WHERE submitted = 1 AND result = "to_be_determined" AND YEAR(submitted_date) = YEAR(CURDATE()) AND previous_contract = 0';

        $sentence = $connection-> prepare($sql);
        $sentence1 = $connection-> prepare($sql1);
        $sentence2 = $connection-> prepare($sql2);
        $sentence3 = $connection-> prepare($sql3);
        $sentence4 = $connection-> prepare($sql4);

        $sentence-> execute();
        $sentence1-> execute();
        $sentence2-> execute();
        $sentence3-> execute();
        $sentence4-> execute();

        $result = $sentence-> fetch(PDO::FETCH_ASSOC);
        $result1 = $sentence1-> fetch(PDO::FETCH_ASSOC);
        $result2 = $sentence2-> fetch(PDO::FETCH_ASSOC);
        $result3 = $sentence3-> fetch(PDO::FETCH_ASSOC);
        $result4 = $sentence4-> fetch(PDO::FETCH_ASSOC);

        if(!empty($result)){
          $cancelled = $result['cancelled'];
        }

        if(!empty($result1)){
          $disqualified = $result1['disqualified'];
        }

        if(!empty($result2)){
          $loss = $result2['loss'];
        }

        if(!empty($result3)){
          $re_posted = $result3['re_posted'];
        }

        if(!empty($result4)){
          $to_be_determined = $result4['to_be_determined'];
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return array($cancelled, $disqualified, $loss, $re_posted, $to_be_determined);
  }

  public static function print_comments_projects(){
    Connection::open_connection();
    $projects = self::get_all_projects(Connection::get_connection());
    Connection::close_connection();
    if(count($projects)){
      foreach ($projects as $project) {
        ?>
        <ul class="timeline">
          <li class="clickable_title">
            <i class="fa fa-bookmark"></i>
            <div class="timeline-item">
              <h3 class="timeline-header">Project: <a href="<?php echo INFO_PROJECT_AND_SERVICES . $project-> get_id(); ?>"><?php echo $project-> get_project_name(); ?></a></h3>
            </div>
          </li>
          <?php
          Connection::open_connection();
          $comments = CommentRepository::get_all_comments_by_id_project(Connection::get_connection(), $project-> get_id());
          Connection::close_connection();
          ?><?php
          foreach ($comments as $comment) {
            $comment_date = self::mysql_datetime_to_english_format($comment-> get_comment_date());
            ?>
            <li class="body_comments">
              <i class="fa fa-user"></i>
              <div class="timeline-item">
                <span class="time"><i class="far fa-clock"></i> <?php echo $comment_date; ?></span>
                <h3 class="timeline-header">
                  <span class="text-primary">
                  <?php
                  Connection::open_connection();
                  $user = UserRepository::get_user_by_id(Connection::get_connection(), $comment-> get_id_user());
                  Connection::close_connection();
                  echo $user-> get_username();
                  ?>
                  </span>
                   said</h3>
                <div class="timeline-body">
                  <?php echo nl2br($comment-> get_comment()); ?>
                </div>
              </div>
            </li>
            <?php
          }
          ?>
          <li>
            <i class="fa fa-infinity"></i>
          </li>
          </ul>
          <br>
          <?php
      }
    }
  }

  public static function print_search_result($project) {
    if (!isset($project)) {
      return;
    }
    $submitted_date = self::mysql_date_to_english_format($project-> get_submitted_date());
    $award_date = self::mysql_date_to_english_format($project-> get_award_date());
    ?>
    <tr>
      <td>
        <a href="<?php echo INFO_PROJECT_AND_SERVICES .$project-> get_id(); ?>" class="btn-block">
          <?php echo $project-> get_code(); ?>
        </a>
      </td>
      <td>
        <?php
        Connection::open_connection();
        $user = UserRepository::get_user_by_id(Connection::get_connection(), $project-> get_designated_user());
        Connection::close_connection();
        echo $user-> get_username();
        ?>
      </td>
      <td><?php echo $submitted_date; ?></td>
      <td><?php echo $award_date; ?></td>
      <td><?php echo $project-> get_result(); ?></td>
      <td><?php echo $project-> get_id(); ?></td>
    </tr>
    <?php
  }

  public static function print_search_results($projects){
    ?>
    <table id="search_table" class="table table-bordered table-responsive-md">
      <thead>
        <tr>
          <th>CODE</th>
          <th>DEDIGNATED USER</th>
          <th>SUBMITTED DATE</th>
          <th>AWARD DATE</th>
          <th>RESULT</th>
          <th>PROPOSAL</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($projects as $project) {
          self::print_search_result($project);
        }
        ?>
      </tbody>
    </table>
    <?php
  }

  public static function set_total_service_equipment($connection, $total_service, $total_equipment, $id_project){
    if(isset($connection)){
      try{
        $sql = 'UPDATE projects SET total_service = :total_service, total_equipment = :total_equipment WHERE id = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':total_service', $total_service, PDO::PARAM_STR);
        $sentence-> bindParam(':total_equipment', $total_equipment, PDO::PARAM_STR);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function set_submitted_state($connection, $id_project){
    if(isset($connection)){
      try{
        $sql = 'UPDATE projects SET submitted = 1, submitted_date = NOW(), expiration_date = DATE_ADD(NOW(), INTERVAL 3 MONTH) WHERE id = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function set_award_state($connection, $id_project){
    if(isset($connection)){
      try{
        $sql = 'UPDATE projects SET award = 1, award_date = NOW() WHERE id = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function set_follow_up_state($connection, $id_project){
    if(isset($connection)){
      try{
        $sql = 'UPDATE projects SET follow_up = 1 WHERE id = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function set_result_proposed_price_and_expiration_date($connection, $result, $proposed_price, $expiration_date, $id_project){
    if(isset($connection)){
      try{
        $sql = 'UPDATE projects SET result = :result, proposed_price = :proposed_price, expiration_date = :expiration_date WHERE id = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':result', $result, PDO::PARAM_STR);
        $sentence-> bindParam(':proposed_price', $proposed_price, PDO::PARAM_STR);
        $sentence-> bindParam(':expiration_date', $expiration_date, PDO::PARAM_STR);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function delete_project($connection, $id_project){
    if(isset($connection)){
      try{
        $sql = 'DELETE FROM projects WHERE id = :id';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function get_all_submitted_projects($connection){
    $submitted_projects = [];
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM projects WHERE submitted = 1 AND award = 0 AND follow_up = 0 ORDER BY id DESC';
        $sentence = $connection-> prepare($sql);
        $sentence-> execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
        if(count($result)){
          foreach ($result as $row) {
            $submitted_projects[] = new Project($row['id'], $row['id_user'], $row['start_date'], $row['code'], $row['link'], $row['project_name'], $row['end_date'], $row['priority'], $row['description'], $row['submission_instructions'], $row['type'], $row['flowchart'], $row['designated_user'], $row['reviewed_project'], $row['priority_color'], $row['subject'], $row['result'], $row['proposed_price'], $row['business_type'], $row['submitted'], $row['follow_up'], $row['award'], $row['submitted_date'], $row['award_date'], $row['expiration_date'], $row['address'], $row['ship_to'], $row['total_service'], $row['total_equipment'], $row['members'], $row['previous_contract']);
          }
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $submitted_projects;
  }

  public static function print_submitted_project($submitted_project){
    if (!isset($submitted_project)) {
      return;
    }
    $submitted_date = self::mysql_date_to_english_format($submitted_project-> get_submitted_date());
    ?>
    <tr>
      <td>
        <a href="<?php echo INFO_PROJECT_AND_SERVICES . $submitted_project-> get_id(); ?>" class="btn-block">
          <?php echo $submitted_project-> get_code(); ?>
        </a>
      </td>
      <td>
        <?php
        Connection::open_connection();
        $user = UserRepository::get_user_by_id(Connection::get_connection(), $submitted_project-> get_designated_user());
        Connection::close_connection();
        echo $user-> get_username();
        ?>
      </td>
      <td><?php echo $submitted_date; ?></td>
      <td>$ <?php echo number_format($submitted_project-> get_total_service(), 2); ?></td>
      <td><?php echo $submitted_project-> get_result(); ?></td>
      <td><?php echo $submitted_project-> get_id(); ?></td>
      <td><span class="text-info"><?php if($submitted_project-> get_previous_contract()){echo 'Previous contract';}else{echo 'Project';} ?></span></td>
    </tr>
    <?php
  }

  public static function print_submitted_projects(){
    Connection::open_connection();
    $submitted_projects = self::get_all_submitted_projects(Connection::get_connection());
    Connection::close_connection();
    ?>
    <table id="submitted_projects_table" class="table table-bordered table-responsive-md">
      <thead>
        <tr>
          <th>CODE</th>
          <th>DEDIGNATED USER</th>
          <th>SUBMITTED DATE</th>
          <th>AMOUNT</th>
          <th>RESULT</th>
          <th>PROPOSAL</th>
          <th>TYPE</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($submitted_projects as $submitted_project) {
          self::print_submitted_project($submitted_project);
        }
        ?>
      </tbody>
    </table>
    <?php
  }

  public static function get_all_follow_up_projects($connection){
    $follow_up_projects = [];
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM projects WHERE submitted = 1 AND award = 0 AND follow_up = 1 ORDER BY id DESC';
        $sentence = $connection-> prepare($sql);
        $sentence-> execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
        if(count($result)){
          foreach ($result as $row) {
            $follow_up_projects[] = new Project($row['id'], $row['id_user'], $row['start_date'], $row['code'], $row['link'], $row['project_name'], $row['end_date'], $row['priority'], $row['description'], $row['submission_instructions'], $row['type'], $row['flowchart'], $row['designated_user'], $row['reviewed_project'], $row['priority_color'], $row['subject'], $row['result'], $row['proposed_price'], $row['business_type'], $row['submitted'], $row['follow_up'], $row['award'], $row['submitted_date'], $row['award_date'], $row['expiration_date'], $row['address'], $row['ship_to'], $row['total_service'], $row['total_equipment'], $row['members'], $row['previous_contract']);
          }
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $follow_up_projects;
  }

  public static function print_follow_up_project($follow_up_project){
    if (!isset($follow_up_project)) {
      return;
    }
    $submitted_date = self::mysql_date_to_english_format($follow_up_project-> get_submitted_date());
    ?>
    <tr>
      <td>
        <a href="<?php echo INFO_PROJECT_AND_SERVICES . $follow_up_project-> get_id(); ?>" class="btn-block">
          <?php echo $follow_up_project-> get_code(); ?>
        </a>
      </td>
      <td>
        <?php
        Connection::open_connection();
        $user = UserRepository::get_user_by_id(Connection::get_connection(), $follow_up_project-> get_designated_user());
        Connection::close_connection();
        echo $user-> get_username();
        ?>
      </td>
      <td><?php echo $submitted_date; ?></td>
      <td>$ <?php echo number_format($follow_up_project-> get_total_service(), 2); ?></td>
      <td><?php echo $follow_up_project-> get_result(); ?></td>
      <td><?php echo $follow_up_project-> get_id(); ?></td>
      <td><span class="text-info"><?php if($follow_up_project-> get_previous_contract()){echo 'Previous contract';}else{echo 'Project';} ?></span></td>
    </tr>
    <?php
  }

  public static function print_follow_up_projects(){
    Connection::open_connection();
    $follow_up_projects = self::get_all_follow_up_projects(Connection::get_connection());
    Connection::close_connection();
    ?>
    <table id="follow_up_projects_table" class="table table-bordered table-responsive-md">
      <thead>
        <tr>
          <th>CODE</th>
          <th>DEDIGNATED USER</th>
          <th>SUBMITTED DATE</th>
          <th>AMOUNT</th>
          <th>RESULT</th>
          <th>PROPOSAL</th>
          <th>TYPE</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($follow_up_projects as $follow_up_project) {
          self::print_follow_up_project($follow_up_project);
        }
        ?>
      </tbody>
    </table>
    <?php
  }

  public static function get_all_award_projects($connection){
    $award_projects = [];
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM projects WHERE award = 1 AND submitted = 1 AND follow_up = 1 ORDER BY id DESC';
        $sentence = $connection-> prepare($sql);
        $sentence-> execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
        if(count($result)){
          foreach ($result as $row) {
            $award_projects[] = new Project($row['id'], $row['id_user'], $row['start_date'], $row['code'], $row['link'], $row['project_name'], $row['end_date'], $row['priority'], $row['description'], $row['submission_instructions'], $row['type'], $row['flowchart'], $row['designated_user'], $row['reviewed_project'], $row['priority_color'], $row['subject'], $row['result'], $row['proposed_price'], $row['business_type'], $row['submitted'], $row['follow_up'], $row['award'], $row['submitted_date'], $row['award_date'], $row['expiration_date'], $row['address'], $row['ship_to'], $row['total_service'], $row['total_equipment'], $row['members'], $row['previous_contract']);
          }
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $award_projects;
  }

  public static function print_award_project($award_project){
    if (!isset($award_project)) {
      return;
    }
    $award_date = self::mysql_date_to_english_format($award_project-> get_award_date());
    ?>
    <tr>
      <td>
        <a href="<?php echo INFO_PROJECT_AND_SERVICES . $award_project-> get_id(); ?>" class="btn-block">
          <?php echo $award_project-> get_code(); ?>
        </a>
      </td>
      <td>
        <?php
        Connection::open_connection();
        $user = UserRepository::get_user_by_id(Connection::get_connection(), $award_project-> get_designated_user());
        Connection::close_connection();
        echo $user-> get_username();
        ?>
      </td>
      <td><?php echo $award_date; ?></td>
      <td>$ <?php echo number_format($award_project-> get_total_service(), 2); ?></td>
      <td><?php echo $award_project-> get_result(); ?></td>
      <td><?php echo $award_project-> get_id(); ?></td>
      <td><span class="text-info"><?php if($award_project-> get_previous_contract()){echo 'Previous contract';}else{echo 'Project';} ?></span></td>
    </tr>
    <?php
  }

  public static function print_award_projects(){
    Connection::open_connection();
    $award_projects = self::get_all_award_projects(Connection::get_connection());
    Connection::close_connection();
    ?>
    <table id="award_projects_table" class="table table-bordered table-responsive-md">
      <thead>
        <tr>
          <th>CODE</th>
          <th>DEDIGNATED USER</th>
          <th>AWARD DATE</th>
          <th>AMOUNT</th>
          <th>RESULT</th>
          <th>PROPOSAL</th>
          <th>TYPE</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($award_projects as $award_project) {
          ConnectionFullFillment::open_connection();
          $fulfillment_project = FulfillmentProjectRepository::get_fulfillment_project_by_id_project(ConnectionFullFillment::get_connection(), $award_project-> get_id());
          ConnectionFullFillment::close_connection();
          if(is_null($fulfillment_project)){
            self::print_award_project($award_project);
          }else if(!$fulfillment_project-> get_received()){
            self::print_award_project($award_project);
          }
        }
        ?>
      </tbody>
    </table>
    <?php
  }

  public static function print_fulfillment_projects(){
    Connection::open_connection();
    $projects = self::get_all_award_projects(Connection::get_connection());
    Connection::close_connection();
    ?>
    <table id="award_projects_table" class="table table-bordered table-responsive-md">
      <thead>
        <tr>
          <th>CODE</th>
          <th>DEDIGNATED USER</th>
          <th>FULFILLMENT DATE</th>
          <th>AMOUNT</th>
          <th>RESULT</th>
          <th>PROPOSAL</th>
          <th>TYPE</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($projects as $project) {
          ConnectionFullFillment::open_connection();
          $fulfillment_project = FulfillmentProjectRepository::get_fulfillment_project_by_id_project(ConnectionFullFillment::get_connection(), $project-> get_id());
          ConnectionFullFillment::close_connection();
          if(!is_null($fulfillment_project)){
            if($fulfillment_project-> get_received()){
              self::print_fulfillment_project($project, $fulfillment_project);
            }
          }
        }
        ?>
      </tbody>
    </table>
    <?php
  }

  public static function print_fulfillment_project($project, $fulfillment_project){
    if (!isset($project)) {
      return;
    }
    $received_date = self::mysql_date_to_english_format($fulfillment_project-> get_received_date());
    ?>
    <tr>
      <td>
        <a href="<?php echo INFO_PROJECT_AND_SERVICES . $project-> get_id(); ?>" class="btn-block">
          <?php echo $project-> get_code(); ?>
        </a>
      </td>
      <td>
        <?php
        Connection::open_connection();
        $user = UserRepository::get_user_by_id(Connection::get_connection(), $project-> get_designated_user());
        Connection::close_connection();
        echo $user-> get_username();
        ?>
      </td>
      <td><?php echo $received_date; ?></td>
      <td>$ <?php echo number_format($project-> get_total_service(), 2); ?></td>
      <td><?php echo $project-> get_result(); ?></td>
      <td><?php echo $project-> get_id(); ?></td>
      <td><span class="text-info"><?php if($project-> get_previous_contract()){echo 'Previous contract';}else{echo 'Project';} ?></span></td>
    </tr>
    <?php
  }

  public static function get_all_previous_contracts($connection, $id_project){
    $previous_contracts = [];
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM projects WHERE previous_contract = :id_project ORDER BY id DESC';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
        if(count($result)){
          foreach ($result as $row) {
            $previous_contracts[] = new Project($row['id'], $row['id_user'], $row['start_date'], $row['code'], $row['link'], $row['project_name'], $row['end_date'], $row['priority'], $row['description'], $row['submission_instructions'], $row['type'], $row['flowchart'], $row['designated_user'], $row['reviewed_project'], $row['priority_color'], $row['subject'], $row['result'], $row['proposed_price'], $row['business_type'], $row['submitted'], $row['follow_up'], $row['award'], $row['submitted_date'], $row['award_date'], $row['expiration_date'], $row['address'], $row['ship_to'], $row['total_service'], $row['total_equipment'], $row['members'], $row['previous_contract']);
          }
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $previous_contracts;
  }

  public static function mysql_date_to_english_format($mysql_date){
    $parts_mysql_date = explode('-', $mysql_date);
    $english_format = $parts_mysql_date[1] . '/' . $parts_mysql_date[2] . '/' . $parts_mysql_date[0];
    return $english_format;
  }

  public static function mysql_datetime_to_english_format($mysql_datetime){
    $parts_mysql_datetime = explode(' ', $mysql_datetime);
    $date = $parts_mysql_datetime[0];
    $time = $parts_mysql_datetime[1];
    $date = self::mysql_date_to_english_format($date);
    $english_format = $date . ' ' . $time;
    return $english_format;
  }

  public static function english_format_to_mysql_date($english_format){
    $parts_english_format = explode('/', $english_format);
    $mysql_date = $parts_english_format[2] . '-' . $parts_english_format[0] . '-' . $parts_english_format[1];
    $mysql_date = strtotime($mysql_date);
    $mysql_date = date('Y-m-d', $mysql_date);
    return $mysql_date;
  }

  public static function english_format_to_mysql_datetime($english_format){
    $parts_english_format = explode(' ', $english_format);
    $date = $parts_english_format[0];
    $time = $parts_english_format[1];
    $parts_date = explode('/', $date);
    $date = $parts_date[2] . '-' . $parts_date[0] . '-' . $parts_date[1];
    $mysql_datetime = $date . ' ' . $time;
    $mysql_datetime = strtotime($mysql_datetime);
    $mysql_datetime = date('Y-m-d H:i:s', $mysql_datetime);
    return $mysql_datetime;
  }
}
?>
