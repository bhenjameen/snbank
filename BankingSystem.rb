#Welcome interface for user
puts ("\n" * 2)
puts "Welcome to the START.NG Banking app! \nWe make Banking fun for you!"

puts ("\n" * 2)
puts "What would you like to do?. \nChoose your desired option."
puts ("\n" * 2)

puts "STAFF LOGIN:  (Press '1' and 'Enter' to log in as Staff)"
puts "CLOSE APP:    (Press '2' and 'Enter' to exit the app)"
puts ("\n" * 2)
response = gets.chomp


def userValidation
    print "\n\nPlease input your USERNAME:  "
    usernameValidation = gets.chomp().to_s
    print "Please input your PASSWORD:  "
    passwordValidation = gets.chomp().to_s

    File.open("staff.txt", "r") do |file|
    if file.read().include? usernameValidation && passwordValidation
        puts "\n\nLogin successful"
        puts "\n\nWelcome Back. \nChoose your desired option"
        userProgress
    else
        pinError
    end
end
end


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
        closeApp
    else
        puts "You have made an invalid selection. \nPlease try again\n\n"
        userProgress
    end
end


def closeApp
    puts "\n\nThank you for banking with us!"
end


def pinError
    puts "\n\nError! Invalid Password or Username, please try again."
    userValidation
end


if response == "1" then
    puts "\n\nTo access your account, input your username and password below"
    userValidation
    elsif response == "2" then
    closeApp
end 

