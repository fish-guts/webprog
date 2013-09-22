Vagrant.configure("2") do |config| 
	config.vm.box = "precise64"
	config.vm.provision :shell, :path => "bootstrap.sh"
	config.vm.network "forwarded_port", guest: 80, host: 8080

	config.vm.provider :virtualbox do |vbox|
		vbox.customize ["modifyvm", :id, "--memory", 1024]
		vbox.customize ["modifyvm", :id, "--name", "web"]
	end
end