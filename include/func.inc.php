<?php
class FunctionClass
{
	function display_menu($parent_id, $level, $region) {
		$result = mysql_query("SELECT a.menu_id, a.menu_name, a.menu_link, Deriv1.Count FROM `tbl_menu` a  LEFT OUTER JOIN (SELECT menu_parent, COUNT(*) AS Count FROM `tbl_menu` GROUP BY menu_parent) Deriv1 ON a.menu_id = Deriv1.menu_parent WHERE a.menu_parent=" . $parent_id ." AND `menu_region`='$region' AND `menu_active`='1' ORDER BY `menu_sort` ") or die(mysql_error());
		while ($row = mysql_fetch_assoc($result)) {
			if ($row['Count'] > 0) {
				echo "\t<li class='menu-item has-submenu' ><a href='" . $row['menu_link'] . "'>" . $row['menu_name'] . "</a><ul class='sub-menu' style='display: none;'>";
						$this->display_menu($row['menu_id'], $level + 1, $region);
				echo "</ul></li>\n";
			} elseif ($row['Count']==0) {
				echo "\t<li><a href='" . $row['menu_link'] . "'>" . $row['menu_name'] . "</a></li>\n";
			} else;
		}
	}
}
?>