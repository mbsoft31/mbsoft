function menu_item(name='', icon='', url=null , sub_items= []) {
	return {name,icon,url,sub_items}
}

module.exports = { 
	menus: [
		{
			role: 'admin',
			items: [
				menu_item(name='Clients','',null, sub_items= [
					menu_item("Client's List", '', '/client'),
					menu_item("Add new Client", '', '/client/create'),
				])
			]
		}

	]
}