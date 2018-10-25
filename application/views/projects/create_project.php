<!-- Page with form to create a new project -->

<?php echo validation_errors(); ?> 
<?php echo form_open_multipart('projects/create_project'); ?>
<?php 
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<main class="container create_project">
    <h2 class="text-center">Create a New Project</h2>
    <section class="row">
        <article class="col-md-6">
            <div class="form-group">
                <label for="title">Project Title</label>
                <input class='form-control' name="title" id="title" type="text" placeholder="">
            </div>

            <div class="form-group">
                <label for="event_location_id">Competition event location</label>
                <select name="event_location_id"id="event_location_id" required>
                    <?php 
                        foreach ($competitions as $row) {
                    ?>
                            <option value= <?php echo "$row->event_location_id"?> >
                                <?php echo $row->name?>
                            </option>
                    <?php
                        }
                    ?>
                </select>   

            </div>

            <div class="form-group">
                <label for="Thumbnail Image">Thumbnail Image</label>
                <input class='form-control' name="thumbnail_image" id="thumbnail_image" type="file">
            </div>
            <div class="form-group">
                <label for="hi_res_image">High Resolution Image</label>
                <p>Upload an image that best shows off your project. We’ll use this on our website, in any promotional materials and at the awards night - so choose well and provide a high-resolution image.</p>
                <input class='form-control' name="hi_res_image" id="hi_res_image" type="file">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <p>Tell us about your project - why did you choose to build it, what does it do, who is it for, et cetera.</p>
                <input class='form-control' name="description" id="description" type="text" placeholder="You can use Markdown to style your description">
            </div>
            <div class="form-group">
                <label for="data_story">Data Story</label>
                <p>Tell us about the data that you have reused and how you have reused it.</p>
                <input class='form-control' name="data_story" id="data_story" type="text" placeholder="You can use Markdown to style your data story">
            </div>
            <div class="form-group">
                <label for="source_code_url">Source Code URL</label>
                <input class='form-control' name="source_code_url" id="source_code_url" type="url" placeholder="http://www.example.com">
            </div>
            <div class="form-group">
                <label for="video_url">Video URL</label>
                <input class='form-control' name="video_url" id="video_url" type="url" placeholder="http://www.example.com">
            </div>
            <div class="form-group">
                <label for="homepage_url">Homepage URL</label>
                <input class='form-control' name="homepage_url" id="homepage_url" type="url" placeholder="http://www.example.com">
            </div>
            <div class="form-group">
                <button id="create_project_button" type="submit" >Create Project</button>
            </div>
        </article>
        </form>
    </section>  
</main>
