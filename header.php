<?php


function get_header(){

    

    $login = false;
    if(isset($_SESSION['user_login'])){
        $login = true;
    }

    $header = '';
    switch($login){
        case false :
            $header = '<div class="container header-box">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
              <a href="../home" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                  <img src="../images/logo.png" style="height: 50px; width: 100px; margin: 0; margin-right: 20px;">
              </a>
      
              <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../cfp" class="nav-link px-2 link-secondary">CFPs</a></li>
                <li><a href="../create_conf" class="nav-link px-2 link-secondary">Create Conference</a></li>
              </ul>
      
              <div class="text-end">
                  <a class="btn btn-outline-primary" name="login-btn" id="login-act">Login</a>
                  <a class="btn btn-warning" name="login-btn" id="signUp-act">Sign up</a>
              </div>
             </div>
             </div>';
            break;
        case true :
            $userdata = getUserData();
            $userName = $userdata['full_name'];
            $header = '<div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
              <a href="../home" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                  <img src="../images/logo.png" style="height: 50px; width: 100px; margin: 0; margin-right: 20px;">
              </a>
      
              <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                  <li><a href="../cfp" class="nav-link px-2 link-secondary">CFPs</a></li>
                  <li><a href="../create_conf" class="nav-link px-2 link-secondary">Create Conference</a></li>
                  
              </ul>
      
             
      
              <div class="dropdown text-end">
                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  <span>'.$userName.'</span>
                  <img src="../images/icons/account.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small">
                  <li><a class="dropdown-item" href="../profile">Profile</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="../select_role">Roles</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="../Logout.php">Sign out</a></li>
                </ul>
              </div>
            </div>
          </div>';
            break;
    }

    return $header;
}

function roleHeader(){

  $role = $_SESSION['user_role'];

  $organizer = '<div>
  <a href="../organizer/" class="btn btn-light btn-header-control">Home</a>
  </div>
  <div>
  <a href="../conf_status" class="btn btn-light btn-header-control">Conference Status</a>
  </div>
  <div>
    <a href="../assi_superchair" class="btn btn-light btn-header-control">Assign Superchair</a>
  </div>
  <div>
  <a href="../participants" class="btn btn-light btn-header-control">Participants</a>
  </div>
  <div>
    <a href="../select_role" class="btn btn-light btn-header-control">Roles</a>
  </div>';

  $superChair = '<div>
  <a href="../superchair/" class="btn btn-light btn-header-control">Home</a>
  </div>
 
  <div>
    <a href="../create_cfp" class="btn btn-light btn-header-control">Create CFP</a>
  </div>
  <div>
    <a href="../assi_track" class="btn btn-light btn-header-control">Assign Tracks</a>
  </div>
  <div>
    <a href="../reviewers" class="btn btn-light btn-header-control">Reviewers</a>
  </div>
  <div>
    <a href="../assign_chair" class="btn btn-light btn-header-control">Assign Chair</a>
  </div>
  <div>
    <a href="../chairs" class="btn btn-light btn-header-control">Chairs</a>
  </div>
  <div>
    <a href="../papers" class="btn btn-light btn-header-control">Papers</a>
  </div>
  <div>
    <a href="../select_role" class="btn btn-light btn-header-control">Roles</a>
  </div>';


  $chair = ' <div>
  <a href="../chair/" class="btn btn-light btn-header-control">Home</a>
  </div>
 
  <div>
  <a href="../assign_reviewer" class="btn btn-light btn-header-control">Assign Reviewer</a>
  </div>
  <div>
  <a href="../reviewers" class="btn btn-light btn-header-control">Reviewers</a>
  </div>
  <div>
  <a href="../papers" class="btn btn-light btn-header-control">Papers</a>
  </div>
  <div>
  <a href="../decide_chair" class="btn btn-light btn-header-control">Result Decision</a>
  </div>
  <div>
  <a href="../select_role" class="btn btn-light btn-header-control">Roles</a>
  </div>';

  

  $pc = '<div>
  <a href="../reviewer/" class="btn btn-light btn-header-control">Home</a>
  </div>
 
  <div>
  <a href="../papers" class="btn btn-light btn-header-control">Papers</a>
  </div>
  <div>
  <a href="../select_role" class="btn btn-light btn-header-control">Roles</a>
  </div>';

  $author = '<div>
  <a href="../author" class="btn btn-light btn-header-control">Home</a>
  </div>
  <div>
  <a href="../submitted" class="btn btn-light btn-header-control">Submitted</a>
  </div>

  <div>
  <a href="../select_role" class="btn btn-light btn-header-control">Roles</a>
  </div>';

  switch($role) {
    case 1 :
      return $organizer;
      break;
    case 2 :
      return $superChair;
      break;
    case 3 :
      return $chair;
      break;
    case 4 :
      return $pc;
      break;
    case 5 :
      return $author;
      break;
    default:
    //nothing
  }

}
?>