<form action="" method="POST">
  <input type="hidden" name="controller" value="players" />
  <input type="hidden" name="action" value="create" />
  <label>Username</label>
  <input name="username" type="text" />
  <input type="submit" value="Submit" />
</form>
<br />
<table>
  <thead>
    <tr data-bind="foreach: headers">
      <th data-bind="click: $parent.sort, text: title"></th>
    </tr>
  </thead>
  <tbody data-bind="foreach: players">
    <tr>
      <td data-bind="text: username"></td>
      <td data-bind="text: kills"></td>
      <td data-bind="text: deaths"></td>
      <td data-bind="text: bountyPoints"></td>
    </tr>
  </tbody>
</table>