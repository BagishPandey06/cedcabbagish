<?php
/**
 * * PHP version 7.2.10
 * 
 * @category Components
 * @package  PackageName
 * @author   Bagish <Bagishpandey999@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://localhost/training/taskmy/logout.php
 */
require 'header.php';
$obj=new User();
$out=$obj->getuser($userid, $data);
?>
<section>

<form action="#" method="POST">
                <p>
                    <label for="name">name:<br>
                    <input type="text" name="name" id="name" 
                    value="<?php echo $out['a'];?>"required>
                    </label>
                </p>
                <p>
                    <label for="mobile">mobile:<br>
                        <input type="mobile" name="mobile" id="mobile"
                        value="<?php echo $out['b'];?>" required>
                    </label>
                </p>
               
                <p>
                    <input type="submit" name="submit" id="btn" class="btn" value="SUBMIT">
                </p>
            </form>
            <script src="details.js"></script>
</section>
<?php
require 'footer.php';
?>