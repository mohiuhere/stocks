
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
    <?php include "link.php"?>
    <title>Sign Up</title>
    </head>
    <body>

    <div class="mt-5 ml-4">
            <form class="needs-validation" novalidate>
                <div class="form-col">
                    <div class="col-md-4 mb-3">
                    <label for="validationTooltip01">First name</label>
                    <input type="text" class="form-control" id="validationTooltip01" placeholder="First name" required>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationTooltip02">Last name</label>
                    <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" required>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationTooltipUsername">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                        </div>
                        <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationTooltipPassword">Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input type="password" class="form-control" id="validationTooltipPassword" placeholder="Passwod" aria-describedby="validationTooltipPassword" required>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="validationTooltipPhoneNumber">Phone Number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input type="tel" class="form-control" id="validationTooltipPhoneNumber" placeholder="Phone Number" aria-describedby="validationTooltipPhoneNumber" required>
                    </div>
                    </div>
                </div>
                <div class="form-col">
                    <div class="col-md-4 mb-3">
                        <label for="address">Address</label>
                        <div class="input-group-prepend">
                        </div>
                        <textarea class="form-control" id="address" aria-label="With textarea"></textarea>
                    </div>
                </div>
                <button class="btn btn-primary ml-3" type="submit">Sign Up</button>
            </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>