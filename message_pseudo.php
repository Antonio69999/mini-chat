<main>
    <section>
        <form action="./process/message_pseudo_trait.php" method="post">


            <h3>Saisissez votre pseudo : </h3>
            <div class="">
                <input type="text" placeholder="Pseudo" class="form-control" name="pseudo" id="exampleFormControlInput1">
            </div>

            <br>

            <h3>Saisissez votre message</h3>
            <div class="">
                <textarea name="textmessage" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <!-- <input type="text" placeholder="Message" name="textmessage" id=""> -->
            </div>

            <br>
            <input type="hidden" name="dateHour" value="<?php date_default_timezone_set('Europe/Paris');
                                                        $date = date('H:i:s'); ?>">
            <div class="">
                <button class="btn btn-primary" type="submit">Envoyé</button>
            </div>
        </form>
        <form action="./process/clear_process.php">
        <div class="">
                <button class="btn btn-danger" type="submit">CLEAR</button>
            </div>
        </form>


        </div>

    </section>
</main>