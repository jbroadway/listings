create table #prefix#listings (
	id int not null auto_increment primary key,
	name char(72) not null,
	link char(128) not null,
	thumbnail char(128) not null,
	type char(48) not null,
	status char(48) not null,
	description text not null,
	user int not null,
	added datetime not null,
	updated datetime not null,
	details text not null,
	index (status, name),
	index (status, type, name),
	index (status, type, updated)
);
