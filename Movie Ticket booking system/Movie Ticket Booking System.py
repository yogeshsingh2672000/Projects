print()
print("Available Movie  ")
print()
films = {
    "Finding Dory":[3, 2],
    "Broune":[18, 5],
    "Tarzan":[15, 1],
    "Ghost Busters":[12, 3]
}

while True:
    for i in list(films.keys()):
        print(i)
    print()

    choice = str(input("Select the movie from the above and enter here: ")).strip()
    print()
    if choice.title() not in list(films.keys()):
        print(list(films.keys()))
        print("Sorry this movie is not available!")
        print()
    else:
        age = int(input("Enter Age: "))
        if age >= films[choice.title()][0]:
            if films[choice.title()][1] > 0:
                print("You can now Watch the Movie")
                films[choice.title()][1] -= 1
            else:
                print("Sorry no more seats available")
        else:
            print("You're too young to watch the movie")
        print()
    looping = str(input("Do you want to Book more Tickets y/n :")).strip()
    if looping == "n":
        break
    print()
