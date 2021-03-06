<?php
/**
 * Created by PhpStorm.
 * User: DanielaCarmelina
 * Date: 10/05/2016
 * Time: 15:15
 */?>
<div class="row">
    <div class="col-md-7 col-md-offset-2 titel">
        <?php foreach($query as $quer):?>
        <h1 name="ticketID">Details van ticket <?= $ticketid = htmlentities($quer ->ticketID,ENT_QUOTES,'UTF-8');?></h1>

    </div>
</div>
<div class="row">


    <div class="col-md-7 col-md-offset-2 main home ">
        <div class="col-md-4 left">
            <h3><?= htmlentities($quer ->onderwerp,ENT_QUOTES,'UTF-8');?></h3>
        </div>
        <div class="col-md-8 right">
            <p>Hier ziet u alle informatie over de gekozen ticket.
                U kunt de prioriteit en status instellen als gewenst.
                Selecteer een werkman om deze herstelling te doen.</p>
        </div>
        <div class="col-md-12 center">
            <form  role="form" method="post" action="<?php echo  site_url(array('Dispatcher','update', $ticketid))?>">
                <?php if($message != "") : ?>
                    <h1><b><?php echo $message;?></b></h1>
                <?php endif; ?>
                <h4>Informatie ticket</h4>
                <div class="form-group">
                    <label for="text">Type:</label>
                    <input disabled type="text" class="form-control"  value=<?= htmlentities($quer ->type,ENT_QUOTES,'UTF-8');?> id="type">
                </div>
                <div class="form-group">
                    <label for="text">Onderwerp</label>
                    <p disabled type="text" class="form-control" id="ont"><?= htmlentities($quer ->onderwerp,ENT_QUOTES);?></p>
                </div>
                <div class="form-group">
                    <label for="text">Aanmaker</label>
                    <input disabled type="email" class="form-control" id="ont" value=<?= htmlentities($quer ->email,ENT_QUOTES,'UTF-8');?>>
                </div>
                <div class="form-group">
                    <label for="text">Campus</label>
                    <p disabled type="txt" class="form-control" id="ont">
                        <?=htmlentities($quer ->naam,ENT_QUOTES,'UTF-8');?></p>
                </div>
                <div class="form-group">
                    <label for="text">Blok en lokaal</label>
                    <p disabled type="txt" class="form-control" id="ont">
                        <?=htmlentities($quer ->blokLetter,ENT_QUOTES,'UTF-8'), htmlentities($quer ->lokaalNummer,ENT_QUOTES,'UTF-8');?></p>
                </div>
                <div class="form-group">
                    <label for="text">Meldingdatum:</label>
                    <input disabled type="date" class="form-control"  value=<?= htmlentities($quer ->datum,ENT_QUOTES,'UTF-8');?> id="datum">
                </div>
                <div class="form-group">
                    <label for="text">Omschrijving:</label>
                    <textarea disabled class="form-control" rows="5" id="Omschrijving"> <?= htmlentities($quer ->omschrijving,ENT_QUOTES,'UTF-8');?></textarea>
                </div>
                <!--********************************************************************************-->
                <h4>In te stellen </h4>
                <div class="form-group">
                    <label for="text">Prioriteit:</label>
                    <select class="form-control" id="satus" name="dprioriteit">
                        <option hidden ><?= htmlentities($quer ->prioriteit,ENT_QUOTES,'UTF-8');?></option>
                        <?php foreach ($prio as $item):?>
                            <option ><?php echo $item;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="text">Werkman:</label>
                    <select class="form-control" id="satus" name="dwerkman">
                        <?php foreach ($werkmanEmail as $email):?>
                            <option hidden ><?php echo $email;?></option>
                        <?php endforeach;?>
                        <?php foreach ($werkmannen as $werkman):?>
                            <option ><?= htmlentities($werkman -> userID,ENT_QUOTES,'UTF-8');?></option>
                            <option disabled ><?= htmlentities($werkman -> email,ENT_QUOTES,'UTF-8');?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="text">Herstellingdatum:</label>
                    <input type="date" name="dherstellingsdatum" class="form-control"  value=<?= htmlentities($quer ->herstellingDatum,ENT_QUOTES,'UTF-8');?> id="Hdate">
                </div>
                <div class="form-group">
                    <label for="text">Deadline:</label>
                    <input name="ddeadline" type="date" class="form-control"  value=<?= htmlentities($quer ->deadline,ENT_QUOTES,'UTF-8');?> id="deadline">
                </div>
                <div class="form-group">
                    <label for="sel1">Selecteer een status</label>
                    <select class="form-control" id="satus" name="dstatus">
                        <option hidden > <?= htmlentities($quer ->status,ENT_QUOTES,'UTF-8');?></option>
                        <?php foreach ($stat as $item):?>
                            <option ><?php echo $item;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <?php endforeach;?>
                <div class="form-group">
                    <button type="submit" name="opslaan" class="btn btn-default">Opslaan</button>
                </div>
            </form>
        </div>
    </div>



    <!--    Bronnen: http://www.w3schools.com/bootstrap/bootstrap_forms.asp-->