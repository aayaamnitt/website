#include <iostream>
using namespace std;

class loc2{
	
public:
	int longitude;
loc2(int lg ){
longitude = lg;

}
};
class loc {
int longitude, latitude;
public:
loc() {}
loc(int lg, int lt) {
longitude = lg;
latitude = lt;
}
void show() {
cout << longitude << " ";
cout << latitude << "\n";
}
loc operator+(loc op2);
loc operator+(loc2 op2);
};



// Overload + for loc.
loc loc::operator+(loc op2)
{
loc temp;
temp.longitude = op2.longitude + longitude;
temp.latitude = op2.latitude + latitude;
return temp;
}


loc loc::operator+(loc2 op2)
{
loc temp;
temp.longitude = op2.longitude + longitude;
temp.latitude = op2.longitude + latitude;
return temp;
}
int main()
{
loc ob1(10, 20), ob2( 5, 30);
loc2 ob3(11);
ob1.show(); // displays 10 20
ob2.show(); // displays 5 30
ob1 = ob1 + ob2;
ob1.show(); // displays 15 50
ob2=ob2+ob3;
ob2.show();
return 0;
}