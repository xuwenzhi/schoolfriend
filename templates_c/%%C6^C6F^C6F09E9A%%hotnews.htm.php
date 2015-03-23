<?php /* Smarty version 2.6.26, created on 2013-11-20 06:22:07
         compiled from hotnews.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'hotnews.htm', 4, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['RDWZ']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotnews']):
?>
    <tr>
        <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
        <td valign="bottom"><a href="news_con.php?news_id=<?php echo $this->_tpl_vars['hotnews']['NewsId']; ?>
&type=<?php echo $this->_tpl_vars['hotnews']['NewsCategory']; ?>
" title="<?php echo $this->_tpl_vars['hotnews']['NewsTitle']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['hotnews']['NewsTitle'])) ? $this->_run_mod_handler('truncate', true, $_tmp, '24', "...", true) : smarty_modifier_truncate($_tmp, '24', "...", true)); ?>
</a></td>
    </tr>
<?php endforeach; endif; unset($_from); ?>