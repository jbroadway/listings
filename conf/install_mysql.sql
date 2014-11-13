create table #prefix#listings (
	id int not null auto_increment primary key,
	name char(72) not null,
	link char(128) not null,
	thumbnail char(128) not null,
	type char(48) not null,
	description text not null,
	user int not null,
	added datetime not null,
	updated datetime not null,
	index (name),
	index (type, name),
	index (type, updated)
);
