<?php
/* Smarty version 3.1.30, created on 2020-04-07 00:37:10
  from "/Applications/XAMPP/xamppfiles/htdocs/mesprojets/ISI/2020/DITI4/geolocalisationSite/src/view/ville/liste.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e8baf16276804_92966101',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85d76084fffea37835b046d539bb4f11839066c4' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/mesprojets/ISI/2020/DITI4/geolocalisationSite/src/view/ville/liste.html',
      1 => 1582225631,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8baf16276804_92966101 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <!-- l'appel de <?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
 vous permet de recupérer le chemin de votre site web  -->
    <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/samane.css"/>
</head>
<body onload="load_design()">
<div class="nav navbar navbar-default navbar-fixed-top">
    <ul class="nav navbar-nav">
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
">Accueil</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Ville/liste">Ville </a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Pays/liste">Pays </a></li>
    </ul>
</div>
<div class="container" style="margin-top:80px;">
    <div class="col-md-6 col-xs-12" >
        <div class="panel panel-info">
            <div class="panel-heading">Liste des pays</div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Identifiant</th>
                        <th>Nom</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Pays</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeVille']->value, 'ville');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ville']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['ville']->value->getId();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ville']->value->getNom();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ville']->value->getLatitude();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ville']->value->getLongitude();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ville']->value->getPays()->getNom();?>
</td>
                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Ville/edit/<?php echo $_smarty_tpl->tpl_vars['ville']->value->getId();?>
">Editer</a></td>
                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Ville/delete/<?php echo $_smarty_tpl->tpl_vars['ville']->value->getId();?>
" onclick="return confirm('Voulez-vous supprimer ?');">Supprimer</a></td>
                    </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="panel panel-info">
            <div class="panel-heading">Formulaire de gestion des pays</div>
            <div class="panel-body">
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Ville/insert">
                    <div class="form-group">
                        <label>Nom</label>
                        <input class="form-control" type="text" name="nom"/>
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input class="form-control" type="text" name="latitude"/>
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input class="form-control" type="text" name="longitude"/>
                    </div>
                    <div class="form-group">
                        <label>Pays</label>
                        <select class="form-control" name="idpays">
                            <option value="">Faites un choix</option>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listePays']->value, 'ville');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ville']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['ville']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['ville']->value->getNom();?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </select>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="valider" value="Envoyer"/>
                        <input class="btn btn-danger" type="reset" name="annuler" value="Annuler"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php }
}
