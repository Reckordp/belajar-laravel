URUT = 6
NAMA = %q(CProject)
DOMAIN = %q(c-project.rq.id)
ROOT = File.expand_path('public', Dir.pwd)

module Resolv
	def domain_baru(domain, alamat=nil)
		paket_aturan = {
			nama_domain: domain, 
			alamat_ip: alamat.nil? ? '127.0.0.1' : alamat
		}

		sys = File.open('/etc/resolv.conf', 'r+')
		sys.pos = sys.size
		sys.write(<<~ATURAN_BARU % paket_aturan)
		nameserver %<alamat_ip>s
		domain %<nama_domain>s
		domain localhost
		ATURAN_BARU
		sys.close
	end
end

module Apache
	def host_web(urutan, nama, domain, root)
		paket_aturan = {
			nama_domain: domain, 
			papan_web: File.expand_path(%q(..), root), 
			ujung_web: root
		}

		aturan_apache = "%03d-%s.conf" % [urutan, nama.downcase]
		rute_aturan = File.join(%q(/etc/apache2/sites-available), aturan_apache)
		return if File.exist?(rute_aturan)
		sys = File.open(rute_aturan, 'w')
		sys.write(<<~ATURAN_APACHE % paket_aturan)
		<Directory %<papan_web>s/>
			Options Indexes FollowSymLinks
			Require all granted
			AllowOverride All
			Order deny,allow
			Allow from all
		</Directory>

		<VirtualHost *:80>
			ServerAdmin webmaster@localhost
			DocumentRoot %<ujung_web>s
			ErrorLog ${APACHE_LOG_DIR}/error.log
			CustomLog ${APACHE_LOG_DIR}/access.log combined

			ServerName %<nama_domain>s
		</VirtualHost>
		ATURAN_APACHE
		sys.close
		sh "ln -fs ../sites-available/#{aturan_apache} /etc/apache2/sites-enabled/#{aturan_apache}"
		sh %q(service apache2 restart)
	end
end

include Resolv
include Apache

class KurangSakti < StandardError ; end

task :siapkanWebsite do
	unless ENV['USER'].eql?('root')
		raise KurangSakti, 'User yang dipakai saat ini bukan root'
	end
	domain_baru(DOMAIN)
	host_web(URUT, NAMA, DOMAIN, ROOT)
end

task :buat_alur do 
	system 'ruby alur_cproject.rb'
end

task default: nil

namespace :db do
	require 'active_record'

	aturan = {
		adapter: 'postgresql', 
		database: 'CProject', 
		username: 'CProject', 
		password: 'Ay1234Pq', 
		host: 'localhost', 
		port: 5432
	}

	# master = {
	# 	adapter: 'postgresql', 
	# 	username: 'reckordp', 
	# 	password: '', 
	# 	database: 'CProject'
	# }

	# task :buat do 
	# 	ActiveRecord::Base.establish_connection(master)
	# 	create
	# 	ActiveRecord::Base.logger = Logger.new(File.open('catatan.log', 'a'))
	# 	vers = 0
	# 	tunjuk_file = Dir.glob('db/*.rb').collect do |target|
	# 		nama = File.basename(target).delete_suffix('.rb').camelize
	# 		vers += 1
	# 		ActiveRecord::MigrationProxy.new(nama, vers, target, nil)
	# 	end
	# 	ActiveRecord::Migrator.new(:up, tunjuk_file).migrate
	# end

	task :hubungkan_database do 
		ActiveRecord::Base.establish_connection(aturan)
		ActiveRecord::Base.logger = Logger.new(File.open('catatan.log', 'a'))
	end

	# [
	# 	:clear, :[], :inspect, :field_name_type=, :result_status, :res_status, :result_error_message, 
	# 	:verbose_error_message, :result_verbose_error_message, :check_result, :ntuples, :tuple, 
	# 	:num_tuples, :nfields, :each, :fname, :num_fields, :ftable, :fnumber, :fformat, :getisnull, 
	# 	:getlength, :nparams, :fmod, :paramtype, :cmd_tuples, :cmdtuples, :cmd_status, :oid_value, 
	# 	:field_values, :tuple_values, :column_values, :cleared?, :autoclear?, :fsize, :error_field, 
	# 	:values, :stream_each, :check, :type_map=, :stream_each_row, :stream_each_tuple, :ftype, 
	# 	:error_message, :ftablecol, :result_error_field, :map_types!, :field_names_as, :getvalue, 
	# 	:fields, :field_name_type, :each_row, :type_map, :index_by, :to_h, :exclude?, :include?, :to_set, 
	# 	:max, :min, :many?, :as_json, :without, :find, :to_a, :entries, :sort, :sort_by, :grep, :grep_v, 
	# 	:count, :detect, :find_index, :find_all, :select, :reject, :collect, :map, :flat_map, 
	# 	:collect_concat, :inject, :reduce, :partition, :group_by, :first, :all?, :any?, :one?, :none?, 
	# 	:minmax, :min_by, :max_by, :minmax_by, :member?, :each_with_index, :reverse_each, :each_entry, 
	# 	:each_slice, :each_cons, :each_with_object, :zip, :take, :take_while, :drop, :drop_while, :cycle, 
	# 	:chunk, :slice_before, :slice_after, :slice_when, :chunk_while, :sum, :uniq, :pluck, :lazy, 
	# 	:to_json, :to_param, :blank?, :duplicable?, :to_query, :to_yaml, :present?, :presence, 
	# 	:instance_variable_names, :acts_like?, :instance_values, :deep_dup, :try, :try!, :unloadable, 
	# 	:require_or_load, :require_dependency, :load_dependency, :host_web, :domain_baru, 
	# 	:instance_variable_set, :instance_variable_defined?, :remove_instance_variable, :instance_of?, 
	# 	:kind_of?, :is_a?, :tap, :instance_variable_get, :instance_variables, :method, :public_method, 
	# 	:singleton_method, :define_singleton_method, :public_send, :class_eval, :extend, :to_enum, 
	# 	:enum_for, :pp, :<=>, :===, :=~, :!~, :eql?, :respond_to?, :freeze, :object_id, :send, :to_s, 
	# 	:display, :nil?, :hash, :class, :singleton_class, :clone, :dup, :itself, :yield_self, :taint, 
	# 	:tainted?, :untrust, :untaint, :trust, :untrusted?, :methods, :frozen?, :protected_methods, 
	# 	:singleton_methods, :public_methods, :private_methods, :!, :equal?, :instance_eval, :==, 
	# 	:instance_exec, :!=, :__send__, :__id__
	# ]

	task :gen => [:hubungkan_database, :buat_alur] do
		conn = ActiveRecord::Base.connection
		schema = conn.execute("select * from schema_migrations")
		internal = conn.execute("select * from ar_internal_metadata")
		schema.each do |struct|
			ver = struct['version']
			conn.execute("delete from schema_migrations where version='%s'" % ver)
		end
		internal.each do |struct|
			key = struct['key']
			value = struct['value']
			conn.execute("delete from ar_internal_metadata where" + 
				"(key='%s' and value='%s')" % [key, value])
		end
		vers = 0
		tunjuk_file = Dir.glob('db/*.rb').collect do |target|
			nama = File.basename(target).delete_suffix('.rb').camelize
			vers += 1
			ActiveRecord::MigrationProxy.new(nama, vers, target, nil)
		end
		ActiveRecord::Migrator.new(:up, tunjuk_file).migrate
	end
end
