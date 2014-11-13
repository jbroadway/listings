create table #prefix#listings (
	id integer primary key,
	name char(72) not null,
	link char(128) not null,
	thumbnail char(128) not null,
	type char(48) not null,
	description text not null,
	user int not null,
	added datetime not null,
	updated datetime not null
);
