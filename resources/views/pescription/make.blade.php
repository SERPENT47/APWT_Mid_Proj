<h2>Make Pescription</h2>
    <form method="post" action="" enctype="multipart/form-data">
        {{@csrf_field()}}
        Pescription: <textarea name="pescription" placeholder="Pescription"></textarea>
        <br><br>
        <input type="submit" value="Save">
    </form>