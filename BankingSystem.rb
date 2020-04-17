#Welcome interface for user
def welcomeInterface
    puts ("\n" * 2)
    sleep 1.0
    puts "..."
    sleep 1.0
    puts "Welcome to the START.NG Banking app! \nWe make Banking fun for you!"

    puts ("\n" * 2)
    sleep 1.0
    puts "..."
    sleep 1.0
    puts "What would you like to do?. \nChoose your desired option."
    puts ("\n")
    sleep 1.0
 
    puts "STAFF LOGIN:  (Press '1' and 'Enter' to log in as Staff)"
    puts "CLOSE APP:    (Press '2' and 'Enter' to exit the app)"
    puts ("\n" * 2)
    response = gets.chomp
    if response == "1" then
        puts    
        sleep 1.0
        puts "..."
        sleep 1.0
        puts "To access your account, input your username and password below"
        userValidation
        elsif response == "2" then
        closeApp
    end 
end


def userValidation
    puts
    sleep 1.0
    puts "..."
    sleep 1.0
    print "Please input your USERNAME:  "
    usernameValidation = gets.chomp
    print "\nPlease input your PASSWORD:  "
    passwordValidation = gets.chomp

    File.open("staff.txt", "r") do |file|
    if file.read().include? usernameValidation && passwordValidation
        sleep 1.0
        puts "\n\n..."
        sleep 1.0
        puts "Login successful"
        puts "\nWelcome Back. \nChoose your desired option"
        userProgress
    else
        pinError
    end
end
end


#Staff Login Interface
def userProgress
    puts "\nCREATE NEW BANK ACCOUNT:  (Press '1' and 'Enter' to create new Bank Account)"
    puts "CHECK ACCOUNT DETAILS:    (Press '2' and 'Enter' to see account details)"
    puts "LOGOUT:                   (Press '3' and 'Enter' to logout)"
    puts ("\n" * 2)
    staffResponse = gets.chomp
    if staffResponse == "1" then
        createNewAccount            
    elsif staffResponse == "2" then
        accountDetails
    elsif
        staffResponse == "3" then
        puts "\n\nYou have successfully logged out"
        welcomeInterface
    else
        puts "You have made an invalid selection. \nPlease try again\n\n"
        userProgress
    end
end


def accountDetails
    puts    
    sleep 1.0
    puts "..."
    sleep 1.0
    print "Please enter your account number:  "
    STDIN.gets
    puts "\n\nSee account details below\n\n"
    File.open("customer.txt", "r") do |file|
        puts file.read()
    end
    puts    
    sleep 1.0
    puts "..."
    sleep 1.0
    puts "\nWelcome Back. \nChoose your desired option"
    userProgress
end


def createNewAccount
    sleep 1.0
    puts "\n\n..."
    sleep 1.0
    puts "Welcome to START.NG Bank. \nPlease fill the following data form..."
    sleep 1.0
    puts "\n..."
    sleep 1.0
    print "ACCOUNT NAME:   "
    accName = gets.chomp
    sleep 1.0
    puts "\n..."
    sleep 1.0
    print "OPENING BALANCE:   "
    openBal = gets.chomp    
    sleep 1.0
    puts "\n..."
    sleep 1.0
    print "ACCOUNT TYPE:   "
    accType = gets.chomp
    sleep 1.0
    puts "\n..."
    sleep 1.0
    print "ACCOUNT EMAIL:   "
    accEmail = gets.chomp
    accNum = 10.times.map{rand(0..9)}.join.to_s
    puts "Your account number is " + accNum

    File.open("customer.txt", "a") do |file|
        file.write("Account name: " + accName + "\n")
        file.write("Account Balance: " + openBal + "\n")
        file.write("Account type: " + accType + "\n")
        file.write("Account email: " + accEmail + "\n")
        file.write("Account number: " + accNum + "\n")
    end
    puts    
    sleep 1.0
    puts "..."
    sleep 1.0
    puts "\nWelcome Back. \nChoose your desired option"
    userProgress
end


def closeApp
    puts "\n\nThank you for banking with us!"
end


def pinError
    puts
    sleep 1.0
    puts "..."
    sleep 1.0
    puts "Error! Invalid Password or Username, please try again."
    userValidation
end



welcomeInterface
