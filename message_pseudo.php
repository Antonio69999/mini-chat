<?php ?>

<main>
    <section>
        <form action="./process/message_pseudo_trait.php" method="post">

            <h3>Saisissez votre pseudo : </h3>
            <input type="text" placeholder="Pseudo" name="pseudo" id="">

            <br>

            <h3>Saisissez votre message</h3>
            <input type="text" placeholder="Message" name="textmessage" id="">
            <br>
            <input type="hidden" name="dateHour" value="<?php date_default_timezone_set('Europe/Paris'); $date = date('H:i:s');?>">

            <br>
            <br>
            <button type="submit" class="btn" >Envoyé</button>
        </form>
    </section>
</main>

<?php var_dump($date)?>
