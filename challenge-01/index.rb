def findPoint(strArr)
  newArr = strArr.map { |x| x.split(', ') }
  newArr[0] & newArr[1]
end

# keep this function call here
p findPoint(['1, 3, 4, 7, 13', '1, 2, 4, 13, 15']) # "1,4,13"
p findPoint(['1, 3, 9, 10, 17, 18', '1, 4, 9, 10']) # "1,9,10"
