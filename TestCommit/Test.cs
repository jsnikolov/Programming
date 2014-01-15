using System;

 class Test
    {
        static void Main()
        {
            float r = 5f;
            float pi = (float)Math.PI;
            float pi1 = 3.14f;
            float perimeter = pi * r * 2;
            float area = pi * (r*r);

            Console.WriteLine(perimeter);
            Console.WriteLine(area);

            int numberA = 15;
            int numberB = 25;
            
            int count = (Math.Max(numberA, numberB) / 5) - ((Math.Min(numberA, numberB)-1) / 5);
            Console.WriteLine("Броят на числата в диапазона ({0} .. {1}), които се делят на 5 е {2}. \n", Math.Min(numberA, numberB), Math.Max(numberA, numberB), count);
            int? result = null;
            int i = 0;
            for (  i = numberA; i <= numberB; i++)
            {
                result = i / 5;
                if(result == 0)
                {
                   //m ++;
                }
                //Console.WriteLine(result);
                //Console.WriteLine("{0, 2:x} {1, 15:c} {0, 10:d3}", i);
            }

            Console.WriteLine(result/5);
            //int a = 5;
            //int b = 10;
            //string result = a.ToString() + b;
            //Console.WriteLine(result);
            int a = int.MinValue;
            int b = int.MinValue+1;

            Console.WriteLine(Convert.ToString(a, 2).PadLeft(32, '0'));
            Console.WriteLine(Convert.ToString(b, 2).PadLeft(32, '0'));
            Console.WriteLine(Convert.ToString((a - b), 2).PadLeft(32, '0'));
            Console.WriteLine(Convert.ToString(((a - b) >> 31), 2).PadLeft(32, '0'));
            Console.WriteLine("{0} = {1}", Convert.ToString((a - b) & ((a - b) >> 31), 2).PadLeft(32, '0'), (a - b) & ((a - b) >> 31));

            int max = a - ((a - b) & ((a - b) >> 31));
            
            //Console.WriteLine(Convert.ToString(max, 2).PadLeft(32, '0'));
            Console.WriteLine(max);
        }
    }

